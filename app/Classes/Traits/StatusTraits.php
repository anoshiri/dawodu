<?php

namespace App\Classes\Traits;
use Illuminate\Database\Eloquent\Builder;

trait StatusTraits
{
    /**
     * Check if model is active.
     *
     * @return void
     */
    public function scopeIsActive(Builder $query) : void
    {
        $query->where('status', '>', 0);
    }
}
