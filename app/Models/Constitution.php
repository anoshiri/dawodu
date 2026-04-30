<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['subject', 'content', 'constitution_id', 'user_id', 'sort', 'status'])]
class Constitution extends BaseModel
{
    protected function casts(): array
    {
        return [
            'status' => 'boolean',
        ];
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(Constitution::class, 'constitution_id');
    }

    public function subsections(): HasMany
    {
        return $this->hasMany(Constitution::class, 'constitution_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
