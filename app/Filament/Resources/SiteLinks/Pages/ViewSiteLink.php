<?php

namespace App\Filament\Resources\SiteLinks\Pages;

use App\Filament\Resources\SiteLinks\SiteLinkResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSiteLink extends ViewRecord
{
    protected static string $resource = SiteLinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
