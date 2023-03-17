<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    /**
     * Get all of the tags for the portfolio.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * Get this post portfolio
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function statistic(): MorphOne
    {
        return $this->morphOne(Statistic::class, 'statisticable');
    }

    /**
     * Scope a query to get related portfolios.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRelatedPortfolios($query)
    {
        return $query->whereHas('tags', function ($query) {
            $query->whereIn('name', $this->tags->pluck('name')->toArray());
        });
    }

    /**
     * Automatically add slug to portfolio
     */
    protected static function boot()
    {
        parent::boot();
        self::creating(function ($portfolio) {
            $portfolio->slug = Str::slug($portfolio->title);
        });
    }
}
