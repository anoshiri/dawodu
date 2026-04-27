<?php

namespace App\Filament\Resources\Events\Tables;

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

class EventsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->disk('local')->circular(),

                TextColumn::make('subject')
                    ->sortable()->searchable(),

                TextColumn::make('venue')
                    ->sortable()->searchable(),

                TextColumn::make('start_date')
                    ->date()
                    ->sortable()->searchable(),

                TextColumn::make('start_time')
                    ->sortable()->searchable()
                    ->dateTime(config('dawodu.timeFormat')),

                TextColumn::make('end_date')
                    ->date()
                    ->sortable()->searchable(),

                TextColumn::make('end_time')
                    ->sortable()->searchable()
                    ->dateTime(config('dawodu.timeFormat')),


                TextColumn::make('tags')
                    ->label('SEO Tags')->separator(',')
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
