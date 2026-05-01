<?php

namespace App\Classes\Traits;
use Illuminate\Database\Eloquent\Builder;

trait TagsTraits
{
    /**
     * Check which tags are available.
     *
     * @return void
     */
    public function scopeIsTrending(Builder $query): void
    {
        $query->where('sections', 'like', '%"trending"%');
    }

    /**
     * Check which sections are available.
     *
     * @return void
     */
    public function scopeIsPopular(Builder $query): void
    {
        $query->where('sections', 'like', '%"popular"%');
    }

    /**
     * Check which sections are available.
     *
     * @return void
     */
    public function scopeIsFeatured(Builder $query): void
    {
        $query->where('sections', 'like', '%"featured"%');
    }

    /**
     * Check which sections are available.
     *
     * @return void
     */
    public function scopeIsFlash(Builder $query): void
    {
        $query->where('sections', 'like', '%"flash"%');
    }

    /**
     * Check which tags are available.
     *
     * @return void
     */
    public function scopeIsMostShared(Builder $query): void 
    {
        $query->where('sections', 'like', '%"most-shared"%');
    }

    /**
     * Check which tags are available.
     *
     * @return void
     */
    public function scopeIsGalleryArticle(Builder $query): void
    {
        $query->where('sections', 'like', '%"gallery-article"%');
    }
}
