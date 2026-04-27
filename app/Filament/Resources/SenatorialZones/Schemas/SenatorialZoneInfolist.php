<?php

namespace App\Filament\Resources\SenatorialZones\Schemas;

use App\Models\SenatorialZone;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class SenatorialZoneInfolist
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
                    ->visible(fn (SenatorialZone $record): bool => $record->trashed()),
            ]);
    }
}
