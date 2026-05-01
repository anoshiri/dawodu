<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

#[Fillable(['title', 'publication_date', 'length', 'url', 'blog', 'featured', 'user_id', 'sites', 'sort', 'tags', 'image', 'status'])]
class Video extends BaseModel
{
    protected $appends = ['local_url'];

    protected function casts(): array
    {
        return [
            'tags' => 'array',
            'publication_date' => 'date',
            'sites' => 'array',
            'featured' => 'boolean',
            'status' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeIsFeatured(Builder $query): void
    {
        $query->where('featured', 1);
    }

    /**
     * Assessor for local_url
     */
    protected function localUrl(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => '/videos/'.Str::slug($attributes['title'].' '.$attributes['id']),
        );
    }

    /**
     * Assessor for url
     */
    protected function url(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => getYoutubeEmbedLink($value),
        );
    }
}
