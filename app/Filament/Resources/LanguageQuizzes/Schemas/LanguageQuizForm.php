<?php

namespace App\Filament\Resources\LanguageQuizzes\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class LanguageQuizForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('Brief Description'),

                Select::make('language')
                    ->label('Language Category')
                    ->required()
                    ->options(config('dawodu.languages'))
                    ->helperText('Select an option'),

                TagsInput::make('tags')
                    ->label('SEO Tags')
                    ->helperText('Add key words to help search engine indexing. Press the [ Enter ] key after each keyword or phrase'),

                TextInput::make('sort')
                    ->label('Display order')
                    ->numeric()
                    ->integer()
                    ->minValue(1)
                    ->maxValue(127)
                    ->helperText('Optional - To Override default alphabetical sort order. It will be sorted in ascending order.'),

                Toggle::make('status'),
            ]);
    }
}
