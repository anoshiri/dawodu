<?php

namespace App\Filament\Resources\FederalConstituencies\Pages;

use App\Filament\Resources\FederalConstituencies\FederalConstituencyResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewFederalConstituency extends ViewRecord
{
    protected static string $resource = FederalConstituencyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
