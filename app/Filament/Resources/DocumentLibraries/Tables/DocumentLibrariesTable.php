<?php

namespace App\Filament\Resources\DocumentLibraries\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class DocumentLibrariesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('publication_date')->date()
                    ->sortable()->searchable(),
                
                Tables\Columns\IconColumn::make('status')->boolean()
                    ->sortable()->searchable(),

                Tables\Columns\TextColumn::make('title')
                    ->sortable()->searchable(),

                Tables\Columns\TextColumn::make('sort'),

                Tables\Columns\TextColumn::make('sites')->separator(',')
                    ->sortable()->searchable(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(config('dawodu.dateFormat'). ' '. config('dawodu.timeFormat')),
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
