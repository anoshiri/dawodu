<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\File;

#[Fillable(['title', 'email', 'phone', 'address', 'locality', 'city', 'code', 'state', 'country', 'comment', 'url', 'user_id', 'sort', 'tags', 'image', 'status'])]
class Embassy extends BaseModel
{
    protected function casts(): array
    {
        return [
            'tags' => 'array',
            'status' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function icon(): Attribute
    {
        return Attribute::make(
            get: function () {
                $path = '/assets/img/flag/'.strtolower($this->country).'.png';

                if (File::exists(public_path($path))) {
                    return $path;
                }

                return '/assets/img/flag/ng.png';
            }
        );
    }
}
