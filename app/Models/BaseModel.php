<?php

namespace App\Models;

use App\Classes\Traits\ImageTraits;
use App\Classes\Traits\StatusTraits;
use App\Classes\Traits\TagsTraits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

abstract class BaseModel extends Model
{
    use HasFactory, ImageTraits, SoftDeletes, StatusTraits, TagsTraits;

    protected static function booted()
    {
        static::addGlobalScope(new Scopes\DomainScope);
    }
}
