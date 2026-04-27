<?php

namespace App\Filament\Resources\Embassies\Pages;

use App\Filament\Resources\Embassies\EmbassyResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEmbassies extends ListRecords
{
    protected static string $resource = EmbassyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
