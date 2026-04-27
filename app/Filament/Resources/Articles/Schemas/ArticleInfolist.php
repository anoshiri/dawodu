<?php

namespace App\Filament\Resources\Articles\Schemas;

use App\Models\Article;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ArticleInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('publication_date')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('subject'),
                TextEntry::make('content')
                    ->columnSpanFull(),
                TextEntry::make('source')
                    ->placeholder('-'),
                TextEntry::make('video_url')
                    ->placeholder('-'),
                TextEntry::make('category.title')
                    ->label('Category'),
                TextEntry::make('contributor.id')
                    ->label('Contributor'),
                TextEntry::make('user.name')
                    ->label('User')
                    ->placeholder('-'),
                ImageEntry::make('image')
                    ->placeholder('-'),
                TextEntry::make('sites')
                    ->placeholder('-'),
                TextEntry::make('sections')
                    ->placeholder('-'),
                TextEntry::make('tags')
                    ->placeholder('-'),
                TextEntry::make('related')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('views')
                    ->numeric(),
                TextEntry::make('impressions')
                    ->numeric(),
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
                    ->visible(fn (Article $record): bool => $record->trashed()),
            ]);
    }
}
