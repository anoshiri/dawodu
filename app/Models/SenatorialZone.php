<?php

namespace App\Models;

use App\Enums\NigerianState;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['state_id', 'title', 'status'])]
class SenatorialZone extends BaseModel
{
    protected function casts(): array
    {
        return [
            'state_id' => NigerianState::class,
            'status' => 'boolean',
        ];
    }
}
