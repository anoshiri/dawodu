<?php

namespace App\Filament\Resources\Constitutions\Pages;

use App\Filament\Resources\Constitutions\ConstitutionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListConstitutions extends ListRecords
{
    protected static string $resource = ConstitutionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
