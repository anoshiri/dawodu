<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['title', 'location', 'content', 'url', 'open_time', 'close_time', 'street', 'locality', 'city', 'state', 'phone', 'email', 'twitter', 'facebook', 'instagram', 'tiktok', 'linkedin', 'whatsapp', 'user_id', 'sort', 'tags', 'open_days', 'images', 'videos', 'status'])]
class Tourism extends BaseModel
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
