<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['name', 'email', 'comment', 'tags', 'status'])]
class Feedback extends BaseModel
{
    protected function casts(): array
    {
        return [
            'tags' => 'array',
            'status' => 'boolean',
        ];
    }
}
