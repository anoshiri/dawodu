<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

#[Fillable(['title', 'description', 'language', 'tags', 'total_time', 'number_of_test', 'total_score', 'sort', 'status'])]
class LanguageQuiz extends BaseModel
{
    protected $appends = ['url', 'average_score'];

    protected function casts(): array
    {
        return [
            'tags' => 'array',
        ];
    }

    public function url(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => '/language/quiz/'.Str::slug($attributes['title'].' '.$attributes['id']),
        );
    }

    /**
     * Interact with the url address.
     */
    public function averageScore(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => ($attributes['number_of_test'] < 1) ? 0 : round($attributes['total_score'] / $attributes['number_of_test'], 2, PHP_ROUND_HALF_UP),
        );
    }

    public function questions(): HasMany
    {
        return $this->hasMany(LanguageQuizQuestion::class);
    }
}
