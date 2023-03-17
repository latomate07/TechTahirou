<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Inertia\Inertia;
use App\Models\Portfolio;
use App\Models\Statistic;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $realisations = Portfolio::with('images', 'tags')
                        ->when($request->has('searchByTag'), function($query) use($request) {
                            $query->whereHas('tags', function($tags) use($request) {
                                $tags->where('name', $request->searchByTag);
                            });
                        })
                        ->paginate(6);

        // Get existed tags
        $tagsAttribued = Portfolio::whereHas('tags')->get()->map(function($portfolio) {
            return $portfolio->tags;
        })->collapse();

        return Inertia::render('Portfolios/Home', [
            'realisations' => $realisations,
            'tags' => Tag::all(),
            'tagsAttribued' => $tagsAttribued
        ]);
    }

    public function show(String $uniquePortfolioSlug)
    {   
        $realisation = Portfolio::with(['images', 'tags', 'statistic' => fn($query) => $query->withDefault()])
                                ->firstWhere('slug', $uniquePortfolioSlug);
        // Increment view
        if(is_null($realisation->statistic()->first())) {
            $realisation->statistic()->create([
                'visits' => 1
            ]);
        }
        $realisation->statistic()->increment('visits');

        // Get related realisations
        $relatedRealisations = Portfolio::with('images', 'statistic')->whereNotIn('id', [$realisation->id])->get();

        // Don't continue if realisation wasn't found
        abort_if(is_null($realisation), 404);
        
        return Inertia::render('Portfolios/Show', [
            'realisation' => $realisation,
            'relatedRealisations' => $relatedRealisations
        ]);
    }
}
