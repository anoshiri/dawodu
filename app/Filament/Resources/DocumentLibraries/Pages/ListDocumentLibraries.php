<?php

namespace App\Filament\Resources\DocumentLibraries\Pages;

use App\Filament\Resources\DocumentLibraries\DocumentLibraryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDocumentLibraries extends ListRecords
{
    protected static string $resource = DocumentLibraryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
