<?php

namespace App\Filament\Resources\DocumentLibraries\Schemas;

use App\Models\DocumentLibrary;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class DocumentLibraryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('source')
                    ->placeholder('-'),
                TextEntry::make('publication_date')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('content')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('user.name')
                    ->label('User'),
                TextEntry::make('sort')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('sites')
                    ->placeholder('-'),
                TextEntry::make('tags')
                    ->placeholder('-'),
                TextEntry::make('original_file_name')
                    ->placeholder('-'),
                TextEntry::make('documents')
                    ->placeholder('-')
                    ->columnSpanFull(),
                IconEntry::make('status')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (DocumentLibrary $record): bool => $record->trashed()),
            ]);
    }
}
