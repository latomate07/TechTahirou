<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Comment;
use App\Models\Statistic;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Lang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'user_id',
        'status',
    ];
    
    /**
     * The mutator that should appends the model.
     *
     * @var string
     */
    protected $appends = [
        'created_date',
        'status_translated'
    ];

    /**
     * Get post author
     * 
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     */
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get post category
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category():HasOne
    {
        return $this->hasOne(Category::class)->withDefault([
            'name' => 'Non attribué'
        ]);
    }

    /**
     * Get all post comments
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOneOrMany
     */
    public function comments():HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get post thumbnail
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function thumbnails(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    /**
     * Get all of the tags for the post.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * Get this post statistic
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function statistic(): MorphOne
    {
        return $this->morphOne(Statistic::class, 'statisticable');
    }

    /**
     * Get the post created date
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function createdDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($this->created_at)->diffForHumans()
        );
    }

    /**
     * Get the post status translated
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function statusTranslated(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Lang::get('status.post.' . $this->status)
        );
    }

    /**
     * Automatically add slug to post
     */
    protected static function boot()
    {
        parent::boot();
        self::creating(function ($post) {
            $post->slug = Str::slug($post->title);
        });
    }
}
