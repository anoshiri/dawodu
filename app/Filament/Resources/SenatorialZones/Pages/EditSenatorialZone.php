<?php

namespace App\Filament\Resources\SenatorialZones\Pages;

use App\Filament\Resources\SenatorialZones\SenatorialZoneResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditSenatorialZone extends EditRecord
{
    protected static string $resource = SenatorialZoneResource::class;

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
