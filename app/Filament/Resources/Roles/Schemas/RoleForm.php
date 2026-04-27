<?php

namespace App\Filament\Resources\Roles\Schemas;

use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RoleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                
                TagsInput::make('permissions')
                    ->label('Permissions/Sections')
                    ->suggestions(config('dawodu.permissions'))
                    ->helperText('Define which areas of the admin you wish this role to access and manage. Hit enter after each selection.'),
            ]);
    }
}
