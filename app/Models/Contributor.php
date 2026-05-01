<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

#[Fillable(['first_name', 'last_name', 'suffix', 'email', 'phone', 'twitter', 'facebook', 'instagram', 'tiktok', 'linkedin', 'whatsapp', 'comment', 'user_id', 'sort', 'image', 'status'])]
class Contributor extends BaseModel
{
    protected $appends = ['full_name', 'url'];

    protected function casts(): array
    {
        return [
            'status' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    /**
     * Get the user's first name.
     */
    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => ucfirst($attributes['first_name'] ?? '').' '.ucfirst($attributes['last_name'] ?? ''),
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
            get: fn (mixed $value, array $attributes) => '/contributors/'.Str::slug($attributes['first_name'].' '.$attributes['last_name']).'-'.$attributes['id'],
        );
    }
}
