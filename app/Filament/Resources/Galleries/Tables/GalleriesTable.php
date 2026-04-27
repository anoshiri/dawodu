<?php

namespace App\Filament\Resources\Galleries\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class GalleriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->disk('local')->circular()
                    ->label('Album Cover'),
                
                TextColumn::make('title')
                    ->label('Picture Album Title'),

                TextColumn::make('sites')->separator(',')
                    ->sortable()->searchable(),

                TextColumn::make('images_count')
                    ->counts('images')->label('Images'),

                TextColumn::make('sort')
                    ->label('Display Order'),
                
                IconColumn::make('status')->boolean(),
                
                TextColumn::make('updated_at')
                    ->dateTime(config('dawodu.dateFormat'). ' '. config('dawodu.timeFormat'))
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
