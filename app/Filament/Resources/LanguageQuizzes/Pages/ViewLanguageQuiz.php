<?php

namespace App\Filament\Resources\LanguageQuizzes\Pages;

use App\Filament\Resources\LanguageQuizzes\LanguageQuizResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewLanguageQuiz extends ViewRecord
{
    protected static string $resource = LanguageQuizResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
