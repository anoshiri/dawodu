<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

#[Fillable(['subject', 'content', 'name', 'email', 'forum_id', 'forum_section_id', 'sort', 'image', 'status'])]
class Forum extends BaseModel
{
    protected function casts(): array
    {
        return [
            'status' => 'boolean',
        ];
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Forum::class, 'forum_id');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(Forum::class, 'forum_id');
    }

    public function forumSection(): BelongsTo
    {
        return $this->belongsTo(ForumSection::class);
    }

    public function section()
    {
        return $this->belongsTo(ForumSection::class, 'forum_section_id');
    }

    public function forum()
    {
        return $this->belongsTo(Forum::class, 'forum_id');
    }

    public function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => Str::replace('public/', '', $attributes['image'])
        );
        // if (!Schema::hasColumn($this->getTable(), 'image')) {
        //     return true;
        // }

        // if (!$this->image) {
        //     return '';
        // }

        // return Str::replace('public/','', $this->image);
    }

    /**
     * Check if model is active.
     *
     * @return bool
     */
    public function isActive()
    {
        if (! Schema::hasColumn($this->getTable(), 'status')) {
            return true;
        }

        if ($this->status > 0) {
            return true;
        }

        return false;
    }
}
