<?php

namespace App\Filament\Resources\Embassies;

use App\Filament\Resources\Embassies\Pages\CreateEmbassy;
use App\Filament\Resources\Embassies\Pages\EditEmbassy;
use App\Filament\Resources\Embassies\Pages\ListEmbassies;
use App\Filament\Resources\Embassies\Pages\ViewEmbassy;
use App\Filament\Resources\Embassies\Schemas\EmbassyForm;
use App\Filament\Resources\Embassies\Schemas\EmbassyInfolist;
use App\Filament\Resources\Embassies\Tables\EmbassiesTable;
use App\Models\Embassy;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmbassyResource extends Resource
{
    protected static ?string $model = Embassy::class;

    protected static string|null $label = 'Embassy or Consulate';
    protected static string|null $pluralLabel = 'Embassies & Consulates';
    protected static string|UnitEnum|null $navigationGroup = 'Manage Government Data';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return EmbassyForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return EmbassyInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EmbassiesTable::configure($table);
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
            'index' => ListEmbassies::route('/'),
            'create' => CreateEmbassy::route('/create'),
            'view' => ViewEmbassy::route('/{record}'),
            'edit' => EditEmbassy::route('/{record}/edit'),
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
