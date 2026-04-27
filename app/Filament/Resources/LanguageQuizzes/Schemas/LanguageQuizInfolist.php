<?php

namespace App\Filament\Resources\LanguageQuizzes\Schemas;

use App\Models\LanguageQuiz;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class LanguageQuizInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('description')
                    ->placeholder('-'),
                TextEntry::make('language')
                    ->placeholder('-'),
                TextEntry::make('tags')
                    ->placeholder('-'),
                TextEntry::make('total_time')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('number_of_test')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('total_score')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('sort')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('status')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (LanguageQuiz $record): bool => $record->trashed()),
            ]);
    }
}
