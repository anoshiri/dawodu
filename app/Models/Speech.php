<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['speaker', 'title', 'speech_date', 'event', 'content', 'sort', 'image', 'status'])]
class Speech extends Model
{
    use HasFactory, SoftDeletes;

    protected function casts(): array
    {
        return [
            'speech_date' => 'date',
            'status' => 'boolean',
        ];
    }
}
