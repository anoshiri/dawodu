<?php

namespace App\Filament\Resources\Constitutions\Pages;

use App\Filament\Resources\Constitutions\ConstitutionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewConstitution extends ViewRecord
{
    protected static string $resource = ConstitutionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
