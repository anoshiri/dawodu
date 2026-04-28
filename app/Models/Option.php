<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['option', 'value'])]
class Option extends BaseModel
{
    protected $primaryKey = 'option';

    public $incrementing = false;

    protected $keyType = 'string';
}
