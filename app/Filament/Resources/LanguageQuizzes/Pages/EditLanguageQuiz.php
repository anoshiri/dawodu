<?php

namespace App\Filament\Resources\LanguageQuizzes\Pages;

use App\Filament\Resources\LanguageQuizzes\LanguageQuizResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditLanguageQuiz extends EditRecord
{
    protected static string $resource = LanguageQuizResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
