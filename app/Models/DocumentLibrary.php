<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['title', 'source', 'publication_date', 'content', 'user_id', 'sort', 'sites', 'tags', 'original_file_name', 'documents', 'status'])]
class DocumentLibrary extends BaseModel
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
}
