<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class HomeController extends Controller
{
    /**
     * Return Home View
     */
    public function index() {
        $portfolios = Portfolio::with('images', 'user')
                                ->get()
                                ->take(3);

        $posts = Post::with('user', 'category', 'comments', 'thumbnail')->get();

        return Inertia::render('Home', [
            'posts'      => $posts,
            'portfolios' => $portfolios
        ]);
    }
}
