<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Tag extends Model
{
    use HasFactory;

     /**
     * All of the relationships to be touched.
     *
     * @var array
     */
    protected $touches = ['posts', 'portfolios'];
    
    protected $fillable = [
        'name'
    ];
    
    /**
     * Get all of the posts that are assigned this tag.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function posts(): MorphToMany
    {
        return $this->morphedByMany(Post::class, 'taggable')
                    ->withTimestamps();
    }
 
    /**
     * Get all of the portfolios that are assigned this tag.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function portfolios(): MorphToMany
    {
        return $this->morphedByMany(Portfolio::class, 'taggable')
                    ->withTimestamps();
    }
}
