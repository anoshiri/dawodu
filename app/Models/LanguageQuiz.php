<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['title', 'description', 'language', 'tags', 'total_time', 'number_of_test', 'total_score', 'sort', 'status'])]
class LanguageQuiz extends BaseModel
{
    protected function casts(): array
    {
        return [
            'tags' => 'array',
        ];
    }

    public function questions(): HasMany
    {
        return $this->hasMany(LanguageQuizQuestion::class);
    }
}
