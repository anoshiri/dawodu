<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

#[Fillable(['title', 'sites', 'category_id', 'user_id', 'status'])]
class Category extends BaseModel
{
    protected function casts(): array
    {
        return [
            'sites' => 'array',
            'status' => 'boolean',
        ];
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'category_id');
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
     * Set the user's first name.
     *
     * @param  string  $value
     * @return void
     */
    public function setUserIdAttribute($value)
    {
        $this->attributes['user_id'] = Auth::check() ? Auth::user()->id : null;
    }

    /**
     * Assessor for image url
     *
     * @return string
     */
    protected function url(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => '/category/'.Str::slug($attributes['title']).'-'.$attributes['id'],
        );
    }
}
