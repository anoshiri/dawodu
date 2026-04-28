<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['title', 'publication_date', 'blog', 'user_id', 'sites', 'sort', 'tags', 'image', 'status'])]
class Gallery extends BaseModel
{
    protected function casts(): array
    {
        return [
            'tags' => 'array',
            'publication_date' => 'date',
            'sites' => 'array',
            'status' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(GalleryImage::class);
    }
}
