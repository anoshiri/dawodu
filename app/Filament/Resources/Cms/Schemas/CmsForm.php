<?php

namespace App\Filament\Resources\Cms\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class CmsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Forms\Components\TextInput::make('title')
                    ->label('Content Title')
                    ->required()
                    ->maxLength(255),

                Forms\Components\RichEditor::make('content')
                    ->columnSpanFull()
                    ->required(),

                Forms\Components\FileUpload::make('image')
                    ->label('Cover Image')
                    ->columnSpanFull()
                    ->image()
                    ->disk('local')
                    ->directory('public/cms')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        $date = time().'-';
                        return (string) Str::of($file->getClientOriginalName())->prepend($date);
                    })
                    ->helperText('Select a cover image for this content. Recommended image size is 750x500 px.'),
            ]);
    }
}
