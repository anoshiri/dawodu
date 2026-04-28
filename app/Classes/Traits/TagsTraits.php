<?php

namespace App\Classes\Traits;

trait TagsTraits
{
    /**
     * Check which tags are available.
     *
     * @return bool
     */
    public function scopeIsTrending($query)
    {
        $query->where('sections', 'like', '%"trending"%');
    }

    /**
     * Check which sections are available.
     *
     * @return bool
     */
    public function scopeIsPopular($query)
    {
        $query->where('sections', 'like', '%"popular"%');
    }

    /**
     * Check which sections are available.
     *
     * @return bool
     */
    public function scopeIsFeatured($query)
    {
        $query->where('sections', 'like', '%"featured"%');
    }

    /**
     * Check which sections are available.
     *
     * @return bool
     */
    public function scopeIsFlash($query)
    {
        $query->where('sections', 'like', '%"flash"%');
    }

    /**
     * Check which tags are available.
     *
     * @return bool
     */
    public function scopeIsMostShared($query)
    {
        $query->where('sections', 'like', '%"most-shared"%');
    }

    /**
     * Check which tags are available.
     *
     * @return bool
     */
    public function scopeIsGalleryArticle($query)
    {
        $query->where('sections', 'like', '%"gallery-article"%');
    }
}
