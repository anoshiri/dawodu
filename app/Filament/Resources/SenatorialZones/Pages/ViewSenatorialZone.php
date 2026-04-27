<?php

namespace App\Filament\Resources\SenatorialZones\Pages;

use App\Filament\Resources\SenatorialZones\SenatorialZoneResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSenatorialZone extends ViewRecord
{
    protected static string $resource = SenatorialZoneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
