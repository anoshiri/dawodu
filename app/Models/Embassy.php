<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['title', 'email', 'phone', 'address', 'locality', 'city', 'code', 'state', 'country', 'comment', 'url', 'user_id', 'sort', 'tags', 'image', 'status'])]
class Embassy extends BaseModel
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
