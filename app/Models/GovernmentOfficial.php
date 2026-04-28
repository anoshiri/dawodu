<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['salutation', 'first_name', 'last_name', 'other_names', 'suffix', 'tenure_start', 'tenure_end', 'email', 'phone', 'twitter', 'facebook', 'instagram', 'tiktok', 'linkedin', 'whatsapp', 'youtube', 'position', 'bio', 'xtype', 'state_id', 'constituency_id', 'political_party', 'url', 'user_id', 'sort', 'image', 'status'])]
class GovernmentOfficial extends BaseModel
{
    protected function casts(): array
    {
        return [
            'tenure_start' => 'date',
            'tenure_end' => 'date',
            'status' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
