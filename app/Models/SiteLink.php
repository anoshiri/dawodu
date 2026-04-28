<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['title', 'short', 'url', 'blog', 'xtype', 'twitter', 'facebook', 'instagram', 'tiktok', 'linkedin', 'whatsapp', 'youtube', 'user_id', 'sort', 'tags', 'image', 'status'])]
class SiteLink extends BaseModel
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
