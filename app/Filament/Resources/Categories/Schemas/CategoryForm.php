<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Forms\Components\TextInput::make('title')
                    ->label('Category name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TagsInput::make('sites')
                    ->label('To Be Published on.')
                    ->suggestions(config('dawodu.sites'))
                    ->helperText('You must select site(s) to publish the category on.'),
                
                Forms\Components\Select::make('category_id')
                    ->label('Parent Category')
                    ->relationship('parent', 'title')
                    ->helperText('Optional - select if necessary to aid navigation.'),

                Forms\Components\Toggle::make('status'),
            ]);
    }
}
