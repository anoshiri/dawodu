<?php

namespace App\Filament\Resources\GovernmentOfficials\Pages;

use App\Filament\Resources\GovernmentOfficials\GovernmentOfficialResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewGovernmentOfficial extends ViewRecord
{
    protected static string $resource = GovernmentOfficialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
