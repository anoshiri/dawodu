<?php

namespace App\Filament\Resources\Constitutions\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;

class ConstitutionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Forms\Components\TextInput::make('subject')
                    ->required()
                    ->maxLength(255),

                Forms\Components\RichEditor::make('content'),

                Forms\Components\Select::make('constitution_id')
                    ->label('Parent Section')
                    ->relationship('parent', 'subject')
                    ->searchable(),

                Forms\Components\TextInput::make('sort')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(127),

                Forms\Components\Toggle::make('status')
                    ->required(),
            ]);
    }
}
