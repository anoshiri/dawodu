<?php

namespace App\Filament\Resources\GovernmentOfficials\Pages;

use App\Filament\Resources\GovernmentOfficials\GovernmentOfficialResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGovernmentOfficials extends ListRecords
{
    protected static string $resource = GovernmentOfficialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
