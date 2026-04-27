<?php

namespace App\Filament\Resources\SenatorialZones;

use App\Filament\Resources\SenatorialZones\Pages\CreateSenatorialZone;
use App\Filament\Resources\SenatorialZones\Pages\EditSenatorialZone;
use App\Filament\Resources\SenatorialZones\Pages\ListSenatorialZones;
use App\Filament\Resources\SenatorialZones\Pages\ViewSenatorialZone;
use App\Filament\Resources\SenatorialZones\Schemas\SenatorialZoneForm;
use App\Filament\Resources\SenatorialZones\Schemas\SenatorialZoneInfolist;
use App\Filament\Resources\SenatorialZones\Tables\SenatorialZonesTable;
use App\Models\SenatorialZone;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SenatorialZoneResource extends Resource
{
    protected static ?string $model = SenatorialZone::class;

    protected static string|null $label = 'Senatorial Zone';
    protected static string|null $pluralLabel = 'Senatorial Zones';
    protected static string|UnitEnum|null $navigationGroup = 'Manage Government Data';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return SenatorialZoneForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SenatorialZoneInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SenatorialZonesTable::configure($table);
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
            'index' => ListSenatorialZones::route('/'),
            'create' => CreateSenatorialZone::route('/create'),
            'view' => ViewSenatorialZone::route('/{record}'),
            'edit' => EditSenatorialZone::route('/{record}/edit'),
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
