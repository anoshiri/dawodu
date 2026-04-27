<?php

namespace App\Filament\Resources\Contributors;

use App\Filament\Resources\Contributors\Pages\CreateContributor;
use App\Filament\Resources\Contributors\Pages\EditContributor;
use App\Filament\Resources\Contributors\Pages\ListContributors;
use App\Filament\Resources\Contributors\Pages\ViewContributor;
use App\Filament\Resources\Contributors\Schemas\ContributorForm;
use App\Filament\Resources\Contributors\Schemas\ContributorInfolist;
use App\Filament\Resources\Contributors\Tables\ContributorsTable;
use App\Filament\Resources\Contributors\RelationManagers\ArticlesRelationManager;
use App\Models\Contributor;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContributorResource extends Resource
{
    protected static ?string $model = Contributor::class;

    protected static string|null $label = 'Writer';
    protected static string|null $pluralLabel = 'Contributing Writers Profiles';
    protected static string|UnitEnum|null $navigationGroup = 'Manage Articles and News';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ContributorForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ContributorInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ContributorsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            ArticlesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListContributors::route('/'),
            'create' => CreateContributor::route('/create'),
            'view' => ViewContributor::route('/{record}'),
            'edit' => EditContributor::route('/{record}/edit'),
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
