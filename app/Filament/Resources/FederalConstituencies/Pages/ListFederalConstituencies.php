<?php

namespace App\Filament\Resources\FederalConstituencies\Pages;

use App\Filament\Resources\FederalConstituencies\FederalConstituencyResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFederalConstituencies extends ListRecords
{
    protected static string $resource = FederalConstituencyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
