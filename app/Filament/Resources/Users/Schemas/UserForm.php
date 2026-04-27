<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Filament\Resources\Users\Pages\EditUser;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Livewire\Component;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                TextInput::make('name')
                    ->required(),

                TextInput::make('email')->email()
                    ->required(),
                
                Select::make('role_id')
                    ->label('Role')
                    ->required()
                    ->relationship('role', 'title'),

                TextInput::make('password')
                    ->password()
                    ->required()
                    ->hidden(fn (Component $livewire): bool => $livewire instanceof EditUser),

                Toggle::make('status')
                    ->required(),
            ]);
    }
}
