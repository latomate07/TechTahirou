<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    /**
     * Get related post
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post():BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Get related sub-categories
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subCategories():HasMany
    {
        return $this->hasMany(SubCategory::class);
    }
}
