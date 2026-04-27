<?php

namespace App\Filament\Resources\LanguageQuizzes;

use App\Filament\Resources\LanguageQuizzes\Pages\CreateLanguageQuiz;
use App\Filament\Resources\LanguageQuizzes\Pages\EditLanguageQuiz;
use App\Filament\Resources\LanguageQuizzes\Pages\ListLanguageQuizzes;
use App\Filament\Resources\LanguageQuizzes\Pages\ViewLanguageQuiz;
use App\Filament\Resources\LanguageQuizzes\Schemas\LanguageQuizForm;
use App\Filament\Resources\LanguageQuizzes\Schemas\LanguageQuizInfolist;
use App\Filament\Resources\LanguageQuizzes\Tables\LanguageQuizzesTable;
use App\Filament\Resources\LanguageQuizzes\RelationManagers\QuestionsRelationManager;
use App\Models\LanguageQuiz;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LanguageQuizResource extends Resource
{
    protected static ?string $model = LanguageQuiz::class;

    protected static string|null $label = 'Language Quiz';
    protected static string|null $pluralLabel = 'Create Language Quizzes';
    protected static string|UnitEnum|null $navigationGroup = 'Manage Languages & Culture';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return LanguageQuizForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return LanguageQuizInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LanguageQuizzesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            QuestionsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListLanguageQuizzes::route('/'),
            'create' => CreateLanguageQuiz::route('/create'),
            'view' => ViewLanguageQuiz::route('/{record}'),
            'edit' => EditLanguageQuiz::route('/{record}/edit'),
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
