<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['title', 'publication_date', 'length', 'url', 'blog', 'featured', 'user_id', 'sites', 'sort', 'tags', 'image', 'status'])]
class Video extends BaseModel
{
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
}
