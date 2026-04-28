<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['title', 'url', 'author', 'blog', 'publication_date', 'status'])]
class News extends BaseModel
{
    protected function casts(): array
    {
        return [
            'publication_date' => 'datetime',
            'status' => 'boolean',
        ];
    }
}
