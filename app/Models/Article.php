<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

#[Fillable(['publication_date', 'subject', 'content', 'source', 'video_url', 'category_id', 'contributor_id', 'user_id', 'image', 'sites', 'sections', 'tags', 'related', 'views', 'impressions', 'status'])]
class Article extends BaseModel
{
    protected $appends = ['read_time', 'image_url', 'url', 'by_source', 'abstract'];

    protected function casts(): array
    {
        return [
            'tags' => 'array',
            'publication_date' => 'date',
            'sections' => 'array',
            'related' => 'array',
            'sites' => 'array',
            'status' => 'boolean',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function contributor(): BelongsTo
    {
        return $this->belongsTo(Contributor::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Assessor for image url
     *
     * @return string
     */
    protected function readTime(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => round(Str::wordCount(Str::of($attributes['subject'].' '.$attributes['content'])->toHtmlString()) / 200),
        );
    }


    /**
     * Assessor for image url
     *
     * @return string
     */
    protected function url(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => '/articles/'.Str::slug($attributes['subject'].' '.$attributes['id']),
        );
    }

    /**
     * Assessor for source
     *
     * @return string
     */
    protected function bySource(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => empty($attributes['source']) ? '' : 'By '.$attributes['source'],
        );
    }

    /**
     * Assessor for image url
     *
     * @return string
     */
    protected function abstract(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => htmlspecialchars_decode(substr(strip_tags($attributes['content']), 0, 150).'...'),
        );
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        // increment impressions
        static::retrieved(function ($article) {
            $article->increment('impressions');
        });
    }
}
