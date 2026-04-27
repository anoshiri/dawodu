<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['question', 'options', 'language_quiz_id', 'sort', 'status'])]
class LanguageQuizQuestion extends Model
{
    use HasFactory, SoftDeletes;

    public function languageQuiz(): BelongsTo
    {
        return $this->belongsTo(LanguageQuiz::class);
    }
}
