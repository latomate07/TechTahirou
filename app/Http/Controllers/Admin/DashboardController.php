<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;

class DashboardController extends Controller
{
    public function saveCategory(StoreCategoryRequest $request)
    {
        $validated = $request->validated();

        // Store category
        $category = Post::with('category')
                        ->find($validated['post_id'])
                        ->category()
                        ->updateOrCreate([
                            'name'    => trim($validated['category'])
                        ]);

        // Store sub-category
        if($request->has('sub_category')) {
            $requestSubCategories = Str::of($validated['sub_category'])->explode(',');

            $requestSubCategories->each(function($subCategory) use($category) {
                $category->subCategories()->updateOrCreate([
                    'name'    => trim($subCategory)
                ]); 
            });
        }

        return redirect()->back()->with('success', 'Ajout réussi');
    }
}
