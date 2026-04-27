<?php

namespace App\Filament\Resources\Categories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class CategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->sortable()->searchable(),
                Tables\Columns\TextColumn::make('parent.title', 'Parent Category')
                    ->sortable()->searchable(),

                Tables\Columns\TextColumn::make('children_count')->counts('children')->label('Sub Categories')
                    ->sortable()->searchable(),

                Tables\Columns\TextColumn::make('articles_count')->counts('articles')->label('Articles')
                    ->sortable()->searchable(),

                Tables\Columns\TextColumn::make('sites')->separator(',')
                    ->sortable()->searchable(),

                Tables\Columns\IconColumn::make('status')->boolean(),
                Tables\Columns\TextColumn::make('created_at')->label('Added')
                    ->dateTime(config('dawodu.dateFormat'). ' '. config('dawodu.timeFormat'))
                    ->sortable()->searchable(),
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
