<?php

namespace App\Filament\Resources\DocumentLibraries\Pages;

use App\Filament\Resources\DocumentLibraries\DocumentLibraryResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewDocumentLibrary extends ViewRecord
{
    protected static string $resource = DocumentLibraryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
