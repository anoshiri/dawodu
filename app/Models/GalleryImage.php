<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['subject', 'url', 'gallery_id', 'sort', 'image', 'status'])]
class GalleryImage extends BaseModel
{

    protected $appends = ['image_url'];
    
    protected function casts(): array
    {
        return [
            'status' => 'boolean',
        ];
    }

    public function gallery(): BelongsTo
    {
        return $this->belongsTo(Gallery::class);
    }
}
