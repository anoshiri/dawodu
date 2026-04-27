<?php

namespace App\Filament\Resources\Constitutions;

use App\Filament\Resources\Constitutions\Pages\CreateConstitution;
use App\Filament\Resources\Constitutions\Pages\EditConstitution;
use App\Filament\Resources\Constitutions\Pages\ListConstitutions;
use App\Filament\Resources\Constitutions\Pages\ViewConstitution;
use App\Filament\Resources\Constitutions\Schemas\ConstitutionForm;
use App\Filament\Resources\Constitutions\Schemas\ConstitutionInfolist;
use App\Filament\Resources\Constitutions\Tables\ConstitutionsTable;
use App\Filament\Resources\Constitutions\RelationManagers\ChildrenRelationManager;
use App\Models\Constitution;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ConstitutionResource extends Resource
{
    protected static ?string $model = Constitution::class;

    protected static string|null $label = 'Constitution Section';
    protected static string|null $pluralLabel = 'Nigeria\'s Constitution';
    protected static string|UnitEnum|null $navigationGroup = 'Manage Government Data';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ConstitutionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ConstitutionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ConstitutionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            ChildrenRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListConstitutions::route('/'),
            'create' => CreateConstitution::route('/create'),
            'view' => ViewConstitution::route('/{record}'),
            'edit' => EditConstitution::route('/{record}/edit'),
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
