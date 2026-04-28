<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['speaker', 'title', 'speech_date', 'event', 'content', 'sort', 'image', 'status'])]
class Speech extends BaseModel
{
    protected function casts(): array
    {
        return [
            'speech_date' => 'date',
            'status' => 'boolean',
        ];
    }
}
