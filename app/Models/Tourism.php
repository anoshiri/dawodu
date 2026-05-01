<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

#[Fillable(['title', 'location', 'content', 'url', 'open_time', 'close_time', 'street', 'locality', 'city', 'state', 'phone', 'email', 'twitter', 'facebook', 'instagram', 'tiktok', 'linkedin', 'whatsapp', 'user_id', 'sort', 'tags', 'open_days', 'images', 'videos', 'status'])]
class Tourism extends BaseModel
{
    protected $appends = ['local_url', 'image_urls', 'video_urls'];

    protected function casts(): array
    {
        return [
            'tags' => 'array',
            'images' => 'array',
            'videos' => 'array',
            'status' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function localUrl(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                return '/tourism/'.Str::slug($attributes['title'].' '.$attributes['id']);
            }
        );
    }

    public function imageUrls(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                if (is_array($attributes['images'])) {
                    return array_map(function ($image) {
                        return Str::replace('public/', '/storage/', $image);
                    }, $attributes['images']);
                }
                
                return [];
            },
        );
    }

    /**
     * Assessor for url
     */
    protected function videoUrls(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                if (is_array($attributes['videos'])) {
                    return array_map('getYoutubeEmbedLink', $attributes['videos']);
                }

                return [];
            }
        );
    }
}
