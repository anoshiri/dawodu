<?php

namespace App\Classes\Traits;

trait StatusTraits
{
    /**
     * Check if model is active.
     *
     * @return bool
     */
    public function scopeIsActive($query)
    {
        $query->where('status', '>', 0);
    }
}
