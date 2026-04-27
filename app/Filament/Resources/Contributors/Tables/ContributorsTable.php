<?php

namespace App\Filament\Resources\Contributors\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class ContributorsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->disk('local')->circular(),
                Tables\Columns\TextColumn::make('first_name')
                    ->sortable()->searchable(),
                    
                Tables\Columns\TextColumn::make('last_name')
                    ->sortable()->searchable(),

                Tables\Columns\TextColumn::make('suffix')
                        ->sortable()->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->sortable()->searchable(),

                Tables\Columns\TextColumn::make('phone')
                    ->sortable()->searchable(),

                Tables\Columns\TextColumn::make('linkedin')
                    ->sortable()->searchable(),

                Tables\Columns\TextColumn::make('whatsapp')
                    ->sortable()->searchable(),

                Tables\Columns\TextColumn::make('sort')
                    ->sortable()->searchable(),

                Tables\Columns\IconColumn::make('status')->boolean(),

                Tables\Columns\TextColumn::make('created_at')
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
