<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['option', 'value'])]
class Option extends Model
{
    protected $primaryKey = 'option';

    public $incrementing = false;

    protected $keyType = 'string';
}
