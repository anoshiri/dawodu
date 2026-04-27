<?php

namespace App\Filament\Resources\FederalConstituencies\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FederalConstituencyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Select::make('state_id')
                    ->label('State')
                    ->options(config('dawodu.states'))
                    ->required()
                    ->reactive(),

                TextInput::make('title')
                    ->required(),

                Toggle::make('status')
                    ->required(),
            ]);
    }
}
