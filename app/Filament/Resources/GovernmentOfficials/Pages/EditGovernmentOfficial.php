<?php

namespace App\Filament\Resources\GovernmentOfficials\Pages;

use App\Filament\Resources\GovernmentOfficials\GovernmentOfficialResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditGovernmentOfficial extends EditRecord
{
    protected static string $resource = GovernmentOfficialResource::class;

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
