<?php

namespace App\Filament\Resources\GovernmentOfficials;

use App\Filament\Resources\GovernmentOfficials\Pages\CreateGovernmentOfficial;
use App\Filament\Resources\GovernmentOfficials\Pages\EditGovernmentOfficial;
use App\Filament\Resources\GovernmentOfficials\Pages\ListGovernmentOfficials;
use App\Filament\Resources\GovernmentOfficials\Pages\ViewGovernmentOfficial;
use App\Filament\Resources\GovernmentOfficials\Schemas\GovernmentOfficialForm;
use App\Filament\Resources\GovernmentOfficials\Schemas\GovernmentOfficialInfolist;
use App\Filament\Resources\GovernmentOfficials\Tables\GovernmentOfficialsTable;
use App\Models\GovernmentOfficial;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GovernmentOfficialResource extends Resource
{
    protected static ?string $model = GovernmentOfficial::class;

    protected static string|null $label = 'Government Official';
    protected static string|null $pluralLabel = 'Government Officials';
    protected static string|UnitEnum|null $navigationGroup = 'Manage Government Data';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return GovernmentOfficialForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return GovernmentOfficialInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GovernmentOfficialsTable::configure($table);
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
            'index' => ListGovernmentOfficials::route('/'),
            'create' => CreateGovernmentOfficial::route('/create'),
            'view' => ViewGovernmentOfficial::route('/{record}'),
            'edit' => EditGovernmentOfficial::route('/{record}/edit'),
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
