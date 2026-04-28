<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['first_name', 'last_name', 'email', 'phone', 'address', 'locality', 'city', 'code', 'state', 'country', 'comment', 'status'])]
class Guestbook extends BaseModel
{
    protected function casts(): array
    {
        return [
            'status' => 'boolean',
        ];
    }
}
