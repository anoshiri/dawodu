<?php

namespace App\Classes\Traits;

use Illuminate\Support\Str;

trait ImageTraits
{
    /**
     * Check if model is active.
     *
     * @return bool
     */
    public function getImageUrlAttribute()
    {
        if (empty($this->image)) {
            return null;
        }

        return Str::replace('public/', '/storage/', $this->image);
    }
}
