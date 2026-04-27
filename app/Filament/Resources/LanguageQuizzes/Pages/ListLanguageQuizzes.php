<?php

namespace App\Filament\Resources\LanguageQuizzes\Pages;

use App\Filament\Resources\LanguageQuizzes\LanguageQuizResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLanguageQuizzes extends ListRecords
{
    protected static string $resource = LanguageQuizResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
