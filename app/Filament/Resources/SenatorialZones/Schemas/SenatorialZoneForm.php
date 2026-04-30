<?php

namespace App\Filament\Resources\SenatorialZones\Schemas;

use App\Enums\NigerianState;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SenatorialZoneForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Select::make('state_id')
                    ->label('State')
                    ->options(NigerianState::options())
                    ->required()
                    ->reactive(),

                TextInput::make('title')
                    ->required(),

                Toggle::make('status')
                    ->required(),
            ]);
    }
}
