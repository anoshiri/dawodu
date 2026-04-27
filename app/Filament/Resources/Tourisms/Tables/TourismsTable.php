<?php

namespace App\Filament\Resources\Tourisms\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class TourismsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->sortable()->searchable(),

                TextColumn::make('location')
                    ->sortable()->searchable(),
                    
                TextColumn::make('open_time')
                    ->sortable()->searchable()
                    ->dateTime(config('dawodu.timeFormat')),

                TextColumn::make('close_time')
                    ->sortable()->searchable()
                    ->dateTime(config('dawodu.timeFormat')),

                TextColumn::make('email')
                    ->sortable()->searchable(),

                TextColumn::make('phone')
                    ->sortable()->searchable(),
                    
                IconColumn::make('status')->boolean(),

                TextColumn::make('created_at')
                    ->dateTime(config('dawodu.dateFormat'). ' '. config('dawodu.timeFormat'))->sortable()
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
