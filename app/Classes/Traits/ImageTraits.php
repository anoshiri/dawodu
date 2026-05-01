<?php

namespace App\Classes\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

trait ImageTraits
{
    /**
     * Check if model is active.
     *
     * @return Attribute
     */
    protected function imageUrl() : Attribute
    {
        return Attribute::make(
            get: fn () => empty($this->image) ? '' : Str::replace('public/', '/storage/', $this->image)
        );
    }
}
