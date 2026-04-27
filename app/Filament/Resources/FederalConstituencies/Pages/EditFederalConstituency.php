<?php

namespace App\Filament\Resources\FederalConstituencies\Pages;

use App\Filament\Resources\FederalConstituencies\FederalConstituencyResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditFederalConstituency extends EditRecord
{
    protected static string $resource = FederalConstituencyResource::class;

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
