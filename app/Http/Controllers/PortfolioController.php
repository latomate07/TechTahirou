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

    public function show(Portfolio $portfolio)
    {
        // Increment view
        $portfolio->statistic()->firstOrCreate()->increment('visits');

        // Get related realisations [Temporary]
        $relatedRealisations = Portfolio::with('images', 'statistic')->whereNotIn('id', [$portfolio->id])->get();

        return Inertia::render('Portfolios/Show', [
            'realisation' => $portfolio,
            'relatedRealisations' => $relatedRealisations
        ]);
    }
}
