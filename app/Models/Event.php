<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['subject', 'venue', 'start_date', 'start_time', 'end_date', 'end_time', 'contact_person', 'email', 'phone', 'address', 'locality', 'city', 'code', 'state', 'country', 'twitter', 'facebook', 'instagram', 'tiktok', 'linkedin', 'whatsapp', 'blog', 'user_id', 'sort', 'tags', 'image', 'documents', 'status'])]
class Event extends BaseModel
{
    protected function casts(): array
    {
        return [
            'tags' => 'array',
            'start_date' => 'date',
            'end_date' => 'date',
            'status' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
