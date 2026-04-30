<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

#[Fillable(['title', 'slug', 'content', 'image'])]
class Message extends BaseModel
{
    public function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => (! $this->image) ? '' : Str::replace('public/', '/storage/', $attributes['image']),
        );

    }
}
