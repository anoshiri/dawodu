<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

#[Fillable(['word', 'meaning', 'language', 'user_id', 'sort', 'image', 'status'])]
class Language extends BaseModel
{
    protected function casts(): array
    {
        return [
            'status' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function url(): Attribute
    {
        return Attribute::make(
            get: fn () => '/language/'.$this->language.'/'.Str::slug($this->word.' '.$this->id)
        );
    }
}
