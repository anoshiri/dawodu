<?php

namespace App\Filament\Resources\DocumentLibraries\Pages;

use App\Filament\Resources\DocumentLibraries\DocumentLibraryResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditDocumentLibrary extends EditRecord
{
    protected static string $resource = DocumentLibraryResource::class;

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
