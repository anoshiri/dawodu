<?php

namespace App\Filament\Resources\SiteLinks\Tables;

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

class SiteLinksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->disk('local')->circular(),

                TextColumn::make('title')
                    ->sortable()->searchable(),

                TextColumn::make('url')
                    ->sortable()->searchable(),

                TextColumn::make('xtype')
                    ->label('Type')
                    ->formatStateUsing(fn ($state) => $state?->label())
                    ->sortable()->searchable(),

                TextColumn::make('tags')
                    ->label('SEO Tags')->separator(',')
                    ->sortable()->searchable(),

                IconColumn::make('status')->boolean(),

                TextColumn::make('created_at')
                    ->dateTime(config('dawodu.dateFormat').' '.config('dawodu.timeFormat'))->sortable(),
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
