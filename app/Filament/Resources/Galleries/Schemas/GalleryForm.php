<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                DatePicker::make('publication_date'),
                        
                TextInput::make('title')
                    ->label('Image Gallery Title')
                    ->required()
                    ->maxLength(255),

                TagsInput::make('sites')
                    ->label('Publish Gallery on')
                    ->suggestions(config('dawodu.sites'))
                    ->helperText('Select Site(s) to publish the gallery on'),

                Textarea::make('blog')
                    ->label('Brief Description')
                    ->maxLength(65535),

                TextInput::make('sort')
                    ->label('Display order')
                    ->numeric()
                    ->integer()
                    ->minValue(1)
                    ->maxValue(127)
                    ->helperText('Optional - To override default sort order, newest galleries are listed first'),

                TagsInput::make('tags')
                    ->label('SEO Tags')
                    ->helperText('Add key words to help search engine indexing. Press the [ Enter ] key after each keyword or phrase.'),

                FileUpload::make('image')
                    ->label('Picture Album Cover')
                    ->image()
                    ->disk('local')
                    ->directory('public/gallery')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        $date = time().'-';
                        return (string) Str::of($file->getClientOriginalName())->prepend($date);
                    })
                    ->helperText('Select your preferred cover image.'),

                Toggle::make('status')
                    ->required(),
            ]);
    }
}
