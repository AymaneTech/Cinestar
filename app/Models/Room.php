<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Room extends Model
{
    use HasFactory, Sluggable, QueryCacheable;

    public int $cacheFor = 3600;
    protected static bool $flushCacheOnUpdate = true;

    protected $fillable = ["name", "seats_total"];

    public function zones(): HasMany
    {
        return $this->hasMany(Zone::class);
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, "imageable");
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            "slug" => [
                "source" => "name"
            ]
        ];
    }

    public function filmRooms()
    {
        return $this->hasMany(FilmRoom::class);
    }

}
