<?php

namespace App\Filament\Resources\Messages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class MessageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                TextInput::make('title')
                    ->required(),

                TextInput::make('slug')
                    ->label('Slug (must be unique)')
                    ->required(),

                RichEditor::make('content'),

                FileUpload::make('image')
                ->image()
                ->disk('local')
                ->directory('public/messages')
                ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                    $date = time().'-';
                    return (string) Str::of($file->getClientOriginalName())->prepend($date);
                }),
            ]);
    }
}
