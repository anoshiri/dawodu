<?php

namespace App\Filament\Resources\Tourisms;

use App\Filament\Resources\Tourisms\Pages\CreateTourism;
use App\Filament\Resources\Tourisms\Pages\EditTourism;
use App\Filament\Resources\Tourisms\Pages\ListTourisms;
use App\Filament\Resources\Tourisms\Pages\ViewTourism;
use App\Filament\Resources\Tourisms\Schemas\TourismForm;
use App\Filament\Resources\Tourisms\Schemas\TourismInfolist;
use App\Filament\Resources\Tourisms\Tables\TourismsTable;
use App\Models\Tourism;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TourismResource extends Resource
{
    protected static ?string $model = Tourism::class;

    protected static string|null $label = 'Tourist Attraction';
    protected static string|null $pluralLabel = 'Add Tourist Attractions';
    protected static string|UnitEnum|null $navigationGroup = 'Manage Languages & Culture';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return TourismForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TourismInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TourismsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTourisms::route('/'),
            'create' => CreateTourism::route('/create'),
            'view' => ViewTourism::route('/{record}'),
            'edit' => EditTourism::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
