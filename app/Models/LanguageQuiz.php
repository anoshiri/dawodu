<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['title', 'description', 'language', 'tags', 'total_time', 'number_of_test', 'total_score', 'sort', 'status'])]
class LanguageQuiz extends Model
{
    use HasFactory, SoftDeletes;

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
