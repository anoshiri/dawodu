<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['subject', 'content', 'name', 'email', 'forum_id', 'forum_section_id', 'sort', 'image', 'status'])]
class Forum extends Model
{
    use HasFactory, SoftDeletes;

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
}
