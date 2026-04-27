<?php

namespace App\Filament\Resources\Languages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class LanguageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                TextInput::make('word')
                    ->label('Word or Phrase')
                    ->required()
                    ->maxLength(255),

                RichEditor::make('meaning')
                    ->label('English Translation')
                    ->required(),

                Select::make('language')
                    ->label('Language Category')
                    ->options(config('dawodu.languages'))
                    ->helperText('Select an option'),

                FileUpload::make('image')
                    ->image()
                    ->disk('local')
                    ->directory('public/languages')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        $date = time().'-';
                        return (string) Str::of($file->getClientOriginalName())->prepend($date);
                    }),

                Toggle::make('status'),
            ]);
    }
}
