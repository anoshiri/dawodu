<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

#[Fillable(['title', 'source', 'publication_date', 'content', 'user_id', 'sort', 'sites', 'tags', 'original_file_name', 'documents', 'status'])]
class DocumentLibrary extends BaseModel
{
    protected $appends = ['url', 'doc_url'];

    protected function casts(): array
    {
        return [
            'tags' => 'array',
            'publication_date' => 'date',
            'sites' => 'array',
            'status' => 'boolean',
            'documents' => 'array',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Assessor for URL
     */
    protected function url(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => '/document-library/'.Str::slug($attributes['title'].' '.$attributes['id']),
        );
    }

    /**
     * Assessor for image url
     */
    protected function docUrl(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => Str::replace('public/', '/storage/', $attributes['documents']),
        );
    }
}
