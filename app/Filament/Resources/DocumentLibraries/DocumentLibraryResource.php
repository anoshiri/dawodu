<?php

namespace App\Filament\Resources\DocumentLibraries;

use App\Filament\Resources\DocumentLibraries\Pages\CreateDocumentLibrary;
use App\Filament\Resources\DocumentLibraries\Pages\EditDocumentLibrary;
use App\Filament\Resources\DocumentLibraries\Pages\ListDocumentLibraries;
use App\Filament\Resources\DocumentLibraries\Pages\ViewDocumentLibrary;
use App\Filament\Resources\DocumentLibraries\Schemas\DocumentLibraryForm;
use App\Filament\Resources\DocumentLibraries\Schemas\DocumentLibraryInfolist;
use App\Filament\Resources\DocumentLibraries\Tables\DocumentLibrariesTable;
use App\Models\DocumentLibrary;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class DocumentLibraryResource extends Resource
{
    protected static ?string $model = DocumentLibrary::class;

    protected static string|null $label = 'Document Collection';
    protected static string|null $pluralLabel = 'Add Documents';
    protected static string|UnitEnum|null $navigationGroup = 'Manage Media and Events';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return DocumentLibraryForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return DocumentLibraryInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DocumentLibrariesTable::configure($table);
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
            'index' => ListDocumentLibraries::route('/'),
            'create' => CreateDocumentLibrary::route('/create'),
            'view' => ViewDocumentLibrary::route('/{record}'),
            'edit' => EditDocumentLibrary::route('/{record}/edit'),
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
