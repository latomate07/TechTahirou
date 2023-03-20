<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::with('user', 'category', 'comments', 'thumbnails')
                      ->when($request->has('search'), function($query) use($request) {
                           $query->where('title', 'LIKE', '%'. $request->search .'%');
                      })
                      ->paginate(6);

        return Inertia::render('Blog/Home', [
            'posts' => $posts
        ]);
    }

    public function show(String $uniquePostSlug)
    {   
        $post = Post::with(['user', 'category', 'comments', 'thumbnails', 'statistic'])
                    ->firstWhere('slug', $uniquePostSlug);

        // Increment view
        $post->statistic->increment('visits');

        // Don't continue if post wasn't found
        abort_if(is_null($post), 404);

        // Get related posts
        $relatedPosts = Post::with('user', 'category', 'comments', 'thumbnails', 'statistic')->whereNotIn('id', [$post->id])->get();

        
        return Inertia::render('Blog/Show', [
            'post' => $post,
            'relatedPosts' => $relatedPosts
        ]);
    }
}
