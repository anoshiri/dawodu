<?php

namespace App\Filament\Resources\Embassies\Pages;

use App\Filament\Resources\Embassies\EmbassyResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewEmbassy extends ViewRecord
{
    protected static string $resource = EmbassyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
