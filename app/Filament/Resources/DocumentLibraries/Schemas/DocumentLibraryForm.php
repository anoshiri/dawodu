<?php

namespace App\Filament\Resources\DocumentLibraries\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class DocumentLibraryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Forms\Components\DatePicker::make('publication_date'),

                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('source')
                    ->label('Source / Author')
                    ->required()
                    ->maxLength(255),

                Forms\Components\RichEditor::make('content')
                    ->required(),

                Forms\Components\TextInput::make('sort')
                    ->label('Sort Order')
                    ->numeric()
                    ->integer()
                    ->minValue(1)
                    ->maxValue(127)
                    ->helperText('Optional - To Override default date sort order, most recent articles listed first.'),

                Forms\Components\TagsInput::make('sites')
                    ->label('Publish Library on')
                    ->suggestions(config('dawodu.sites'))
                    ->helperText('Select Site(s) to publish the library on.'),

                Forms\Components\TagsInput::make('tags')
                    ->label('SEO Tags')
                    ->helperText('Add key words to help search engine indexing. Press the [ Enter ] key after each keyword or phrase'),

                Forms\Components\FileUpload::make('documents')
                    ->disk('local')
                    ->multiple()
                    ->directory('public/documents')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        $date = time().'-';
                        return (string) Str::of($file->getClientOriginalName())->prepend($date);
                    })
                    ->helperText('Add as many documents as appropriate (PDF only).'),

                Forms\Components\Toggle::make('status')
                    ->required(),
            ]);
    }
}
