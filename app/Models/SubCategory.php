<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Get category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the category post
     */
    public function categoryPost()
    {
        return $this->hasOneThrough(Post::class, Category::class);
    }
}
