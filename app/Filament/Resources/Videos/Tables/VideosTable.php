<?php

namespace App\Filament\Resources\Videos\Tables;

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

class VideosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // Tables\Columns\ImageColumn::make('image')->disk('local')->circular(),

                IconColumn::make('status')->boolean(),

                TextColumn::make('title')
                    ->sortable()->searchable(),

                TextColumn::make('length')
                    ->sortable()->searchable(),

                TextColumn::make('sites')->separator(',')
                    ->sortable()->searchable(),
                
                IconColumn::make('featured')->boolean()
                    ->sortable(),

                // TextColumn::make('created_at')
                //     ->dateTime(config('dawodu.dateFormat'). ' '. config('dawodu.timeFormat'))->sortable()
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
