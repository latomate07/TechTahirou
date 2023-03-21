<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use Inertia\Inertia;
use App\Models\Media;
use App\Enums\MediaType;
use App\Models\Portfolio;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\StorePortfolioRequest;
use App\Models\Statistic;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    use Authenticatable;

    public function index()
    {
        $statistics = Statistic::with('statisticable')
                                ->has('statisticable')
                                ->get()
                                ->groupBy('statisticable_type')
                                ->map(function ($group, $type) {
                                    return collect([
                                        (new $type)->alias() => [
                                            'max_views' => $group->sum('visits'),
                                            'max_liked' => $group->sum('likes')
                                        ]
                                    ]);
                                })
                                ->collapse();

        return Inertia::render('Dashboard', [
            'posts'      => Post::with('category', 'statistic')->get(),
            'statistics' => $statistics
        ]);
    }

    public function showArticles(Request $request)
    {
        $posts = Post::with('user', 'category', 'comments', 'thumbnails')
                      ->when($request->has('search'), function($query) use($request) {
                           $query->where('title', 'LIKE', '%'. $request->search .'%');
                      })
                      ->paginate(5);

        return Inertia::render('Admin/Articles', [
            'posts' => $posts
        ]);
    }

    public function showPortfolios(Request $request)
    {
        $portfolios = Portfolio::with('images', 'user')
                                ->when($request->has('search'), function($query) use($request) {
                                    $query->where('title', 'LIKE', '%'. $request->search .'%');
                                })
                                ->paginate(5);

        return Inertia::render('Admin/Portfolios', [
            'portfolios' => $portfolios
        ]);
    }

    public function deleteArticle(Request $request, int $id)
    {
        Post::find($id)->delete();
        return redirect()->back()->with('success', 'Article supprimé avec succès !');
    }

    public function deletePortfolio(Request $request, int $id)
    {
        $portfolio = Portfolio::find($id);
        $portfolio->images()->delete();
        $portfolio->delete();

        return redirect()->back()->with('success', 'Portfolio supprimé avec succès !');
    }

    public function createPortfolio()
    {
        return Inertia::render('Portfolios/Create');
    }
    public function createArticle()
    {
        return Inertia::render('Posts/Create');
    }

    public function storePortfolio(StorePortfolioRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::user()->id;
        unset($validated['images']);

        // Get Tags
        $tags = Str::of($validated['tags'])->explode(',');
        unset($validated['tags']);

        // Add new portfolio
        $portfolio = Portfolio::firstOrCreate($validated);

        // Attach tags
        $tags->each(function($tagName) use($portfolio) {
            try {
                $tag = Tag::firstOrCreate(['name' => trim($tagName)]);
            } catch(\Exception $e) {
                $customMessage = "Error occured when trying to attach new tag. ";
                Log::error($customMessage . $e->getMessage());
                $portfolio->delete();

                return redirect()->back()->withErrors('Oups... Une erreur a été produite !');
            }

            $portfolio->tags()->attach($tag->id);
        });

        // Store and Attach images
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $imageName = Str::uuid() . '.' . $image->extension();
                $image->move(public_path('storage/uploads'), $imageName);
                
                $portfolio->images()->save(new Media([
                    'url'  => $imageName,
                    'type' => MediaType::Thumbnail
                ]));
            }
        }

        return redirect()->back()->with('success', 'Portfolio crée avec succès !');
    }

    public function storeArticle(StoreArticleRequest $request)
    {
        $validated = $request->validated();

        // Add new article
        $article = Auth::user()->posts()
                               ->updateOrCreate(collect($validated)
                                                        ->except(['images', 'tags', 'categories', 'sub_categories'])
                                                        ->toArray());
        // Store category
        $category = $article->category()->updateOrCreate([
            'name'    => trim($validated['categories'])
        ]);

        // Store subcategories
        $requestSubCategories = Str::of($validated['sub_categories'])->explode(',');

        $requestSubCategories->when($request->has('sub_categories'), function(Collection $requestSubCategories) use($category) {
            $requestSubCategories->each(function($subCategory) use($category) {
                $category->subCategories()->updateOrCreate([
                    'name'    => trim($subCategory)
                ]); 
            });
        });

        // Attach tags
        $tags = Str::of($validated['tags'])->explode(',');

        $tags->when($request->has('tags'), function(Collection $tags) use($article) {
            $tags->each(function($tagName) use($article) {
                try {
                    $tag = Tag::firstOrCreate(['name' => trim($tagName)]);
                } catch(\Exception $e) {
                    $customMessage = "Error occured when trying to attach new tag. ";
                    Log::error($customMessage . $e->getMessage());
                    $article->delete();
    
                    return redirect()->back()->withErrors('Oups... Une erreur a été produite !');
                }
    
                $article->tags()->attach($tag->id);
            });
        });

        // Store and Attach images
        $images = $validated['images'];
        collect($images)->when($request->hasFile('images'), function(Collection $images) use($article) {
            foreach ($images as $image) {
                $imageName = Str::uuid() . '.' . $image->extension();
                $image->move(public_path('storage/uploads'), $imageName);

                $article->thumbnails()->save(new Media([
                    'url'  => $imageName,
                    'type' => MediaType::Thumbnail
                ]));
            }
        });

        // Set article to active
        $article->status = "publish";
        $article->save();

        return redirect()->back()->with('success', 'Article crée avec succès !');
    }
}
