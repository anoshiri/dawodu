<?php

namespace App\Models;

use App\Enums\AdvertType;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

#[Fillable(['title', 'owner', 'url', 'blog', 'xtype', 'user_id', 'sort', 'tags', 'image', 'status'])]
class Advert extends BaseModel
{
    protected function casts(): array
    {
        return [
            'tags' => 'array',
            'xtype' => AdvertType::class,
            'status' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function url(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => Str::replace('public/', '/storage/', $this->image),
        );
    }

    public function scopeIsTopBanner($query)
    {
        return $query->where('xtype', AdvertType::TopBanner);
    }

    public function scopeIsSideButton($query)
    {
        return $query->where('xtype', AdvertType::SideButton);
    }
}
