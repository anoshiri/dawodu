<?php

namespace App\Filament\Resources\SiteLinks;

use App\Filament\Resources\SiteLinks\Pages\CreateSiteLink;
use App\Filament\Resources\SiteLinks\Pages\EditSiteLink;
use App\Filament\Resources\SiteLinks\Pages\ListSiteLinks;
use App\Filament\Resources\SiteLinks\Pages\ViewSiteLink;
use App\Filament\Resources\SiteLinks\Schemas\SiteLinkForm;
use App\Filament\Resources\SiteLinks\Schemas\SiteLinkInfolist;
use App\Filament\Resources\SiteLinks\Tables\SiteLinksTable;
use App\Models\SiteLink;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SiteLinkResource extends Resource
{
    protected static ?string $model = SiteLink::class;

    protected static string|null $label = 'Site Link';
    protected static string|null $pluralLabel = 'Add Site Links';
    protected static string|UnitEnum|null $navigationGroup = 'Manage Government Data';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return SiteLinkForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SiteLinkInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SiteLinksTable::configure($table);
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
            'index' => ListSiteLinks::route('/'),
            'create' => CreateSiteLink::route('/create'),
            'view' => ViewSiteLink::route('/{record}'),
            'edit' => EditSiteLink::route('/{record}/edit'),
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
