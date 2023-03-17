<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Statistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'visits',
        'likes',
        'trafic_from',
        'views_on_devices'
    ];
    /**
     * Get the statiscable model
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function statiscable(): MorphTo
    {
        return $this->morphTo();
    }
}
