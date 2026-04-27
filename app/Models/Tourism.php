<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['title', 'location', 'content', 'url', 'open_time', 'close_time', 'street', 'locality', 'city', 'state', 'phone', 'email', 'twitter', 'facebook', 'instagram', 'tiktok', 'linkedin', 'whatsapp', 'user_id', 'sort', 'tags', 'open_days', 'images', 'videos', 'status'])]
class Tourism extends Model
{
    use HasFactory, SoftDeletes;

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
