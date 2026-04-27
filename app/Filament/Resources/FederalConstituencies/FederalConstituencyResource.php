<?php

namespace App\Filament\Resources\FederalConstituencies;

use App\Filament\Resources\FederalConstituencies\Pages\CreateFederalConstituency;
use App\Filament\Resources\FederalConstituencies\Pages\EditFederalConstituency;
use App\Filament\Resources\FederalConstituencies\Pages\ListFederalConstituencies;
use App\Filament\Resources\FederalConstituencies\Pages\ViewFederalConstituency;
use App\Filament\Resources\FederalConstituencies\Schemas\FederalConstituencyForm;
use App\Filament\Resources\FederalConstituencies\Schemas\FederalConstituencyInfolist;
use App\Filament\Resources\FederalConstituencies\Tables\FederalConstituenciesTable;
use App\Models\FederalConstituency;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FederalConstituencyResource extends Resource
{
    protected static ?string $model = FederalConstituency::class;

    protected static string|null $label = 'Federal Constituency';
    protected static string|null $pluralLabel = 'Federal Constituencies';
    protected static string|UnitEnum|null $navigationGroup = 'Manage Government Data';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return FederalConstituencyForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FederalConstituencyInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FederalConstituenciesTable::configure($table);
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
            'index' => ListFederalConstituencies::route('/'),
            'create' => CreateFederalConstituency::route('/create'),
            'view' => ViewFederalConstituency::route('/{record}'),
            'edit' => EditFederalConstituency::route('/{record}/edit'),
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
