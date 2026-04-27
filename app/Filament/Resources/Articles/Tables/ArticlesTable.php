<?php

namespace App\Filament\Resources\Articles\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class ArticlesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->disk('local')->circular(),

                Tables\Columns\IconColumn::make('status')->boolean(),

                Tables\Columns\TextColumn::make('publication_date')->date()
                    ->sortable()->searchable(),

                Tables\Columns\TextColumn::make('subject')
                    ->sortable()->searchable(),

                Tables\Columns\TextColumn::make('category.title')->label('Category')
                    ->sortable()->searchable(),

                Tables\Columns\TextColumn::make('readTime')->label('Read time')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('user.name')->label('Posted by')
                    ->sortable(),

                Tables\Columns\TextColumn::make('sites')->separator(',')
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
