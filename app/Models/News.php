<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['title', 'url', 'author', 'blog', 'publication_date', 'status'])]
class News extends Model
{
    use HasFactory, SoftDeletes;

    protected function casts(): array
    {
        return [
            'publication_date' => 'datetime',
            'status' => 'boolean',
        ];
    }
}
