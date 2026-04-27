<?php

namespace App\Filament\Resources\NewsSources;

use App\Filament\Resources\NewsSources\Pages\CreateNewsSource;
use App\Filament\Resources\NewsSources\Pages\EditNewsSource;
use App\Filament\Resources\NewsSources\Pages\ListNewsSources;
use App\Filament\Resources\NewsSources\Pages\ViewNewsSource;
use App\Filament\Resources\NewsSources\Schemas\NewsSourceForm;
use App\Filament\Resources\NewsSources\Schemas\NewsSourceInfolist;
use App\Filament\Resources\NewsSources\Tables\NewsSourcesTable;
use App\Models\NewsSource;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NewsSourceResource extends Resource
{
    protected static ?string $model = NewsSource::class;

    protected static string|null $label = 'News Source';
    protected static string|null $pluralLabel = 'Edit News Sources';
    protected static string|UnitEnum|null $navigationGroup = 'Manage Articles and News';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return NewsSourceForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return NewsSourceInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return NewsSourcesTable::configure($table);
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
            'index' => ListNewsSources::route('/'),
            'create' => CreateNewsSource::route('/create'),
            'view' => ViewNewsSource::route('/{record}'),
            'edit' => EditNewsSource::route('/{record}/edit'),
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
