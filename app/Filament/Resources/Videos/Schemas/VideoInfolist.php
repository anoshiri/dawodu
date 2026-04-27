<?php

namespace App\Filament\Resources\Videos\Schemas;

use App\Models\Video;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class VideoInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('publication_date')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('length')
                    ->placeholder('-'),
                TextEntry::make('url'),
                TextEntry::make('blog')
                    ->placeholder('-')
                    ->columnSpanFull(),
                IconEntry::make('featured')
                    ->boolean()
                    ->placeholder('-'),
                TextEntry::make('user.name')
                    ->label('User')
                    ->placeholder('-'),
                TextEntry::make('sites')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('sort')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('tags')
                    ->placeholder('-'),
                ImageEntry::make('image')
                    ->placeholder('-'),
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
                    ->visible(fn (Video $record): bool => $record->trashed()),
            ]);
    }
}
