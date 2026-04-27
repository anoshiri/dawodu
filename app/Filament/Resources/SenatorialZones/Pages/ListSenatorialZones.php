<?php

namespace App\Filament\Resources\SenatorialZones\Pages;

use App\Filament\Resources\SenatorialZones\SenatorialZoneResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSenatorialZones extends ListRecords
{
    protected static string $resource = SenatorialZoneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
