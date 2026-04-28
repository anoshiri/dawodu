<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['title', 'url', 'email', 'phone', 'twitter', 'facebook', 'instagram', 'tiktok', 'linkedin', 'whatsapp', 'blog', 'user_id', 'sort', 'tags', 'image', 'status'])]
class Partner extends BaseModel
{
    protected function casts(): array
    {
        return [
            'tags' => 'array',
            'status' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
