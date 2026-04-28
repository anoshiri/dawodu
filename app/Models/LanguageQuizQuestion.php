<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['question', 'options', 'language_quiz_id', 'sort', 'status'])]
class LanguageQuizQuestion extends BaseModel
{
    public function languageQuiz(): BelongsTo
    {
        return $this->belongsTo(LanguageQuiz::class);
    }
}
