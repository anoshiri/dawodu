<?php

namespace App\Filament\Resources\SiteLinks\Schemas;

use App\Enums\SiteLinkType;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class SiteLinkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Name of Person/Political Party/ Government Agency/Publication')
                    ->required()
                    ->maxLength(255),

                TextInput::make('short')
                    ->label('Short Form/Nickname/Acronym')
                    ->maxLength(255),

                TextInput::make('url')
                    ->required()
                    ->maxLength(255),

                RichEditor::make('blog'),

                Select::make('xtype')
                    ->label('Type of site link')
                    ->options(SiteLinkType::options()),

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

                TextInput::make('youtube')
                    ->maxLength(255),

                TextInput::make('sort')
                    ->label('Sort Order')
                    ->numeric()
                    ->integer()
                    ->minValue(1)
                    ->maxValue(127)
                    ->helperText('Optional - To Override default alphabetical sort order'),

                TagsInput::make('tags')
                    ->label('SEO Tags')
                    ->helperText('Add key words to help search engine indexing. Press the [ Enter ] key after each keyword or phrase'),

                FileUpload::make('image')
                    ->image()
                    ->disk('local')
                    ->directory('public/site_links')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        $date = time().'-';

                        return (string) Str::of($file->getClientOriginalName())->prepend($date);
                    })
                    ->helperText('Upload an image or logo as appropriate.'),

                Toggle::make('status')
                    ->required(),
            ]);
    }
}
