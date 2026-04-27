<?php

namespace App\Filament\Resources\FederalConstituencies\Schemas;

use App\Models\FederalConstituency;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class FederalConstituencyInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('state_id')
                    ->numeric(),
                TextEntry::make('title'),
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
                    ->visible(fn (FederalConstituency $record): bool => $record->trashed()),
            ]);
    }
}
