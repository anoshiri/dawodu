<?php

namespace App\Filament\Resources\Partners\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class PartnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                TextInput::make('title')
                    ->label('Partner\'s Name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('url')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->email()
                    ->maxLength(255),

                TextInput::make('phone')
                    ->tel()
                    ->maxLength(255),

                TextInput::make('twitter')
                    ->maxLength(255),

                TextInput::make('facebook')
                    ->maxLength(255),

                TextInput::make('instagram')
                    ->maxLength(255),

                TextInput::make('tiktok')
                    ->maxLength(255),

                TextInput::make('linkedin')
                    ->maxLength(255),

                TextInput::make('whatsapp')
                    ->maxLength(255),

                RichEditor::make('blog')
                    ->label('Partner Profile')
                    ->maxLength(65535),

                TagsInput::make('tags')
                    ->label('SEO Tags')
                    ->helperText('Add key words to help search engine indexing. Press the [ Enter ] key after each keyword or phrase.'),

                TextInput::make('sort')
                    ->label('Sort Order')
                    ->numeric()
                    ->integer()
                    ->minValue(1)
                    ->maxValue(127)
                    ->helperText('Optional . To Override default date alphabetical sort order.'),
                
                FileUpload::make('image')
                    ->label('Upload Logo')
                    ->image()
                    ->disk('local')
                    ->directory('public/partners')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        $date = time().'-';
                        return (string) Str::of($file->getClientOriginalName())->prepend($date);
                    }),

                Toggle::make('status')
                    ->required(),
            ]);
    }
}
