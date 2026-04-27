<?php

namespace App\Filament\Resources\Adverts\Schemas;

use App\Enums\AdvertType;
use Filament\Forms;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;


class AdvertForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('title')
                    ->label('Banner Title')
                    ->required()
                    ->maxLength(255),
                
                Forms\Components\TextInput::make('Owner')
                    ->label('Banner Owner')
                    ->maxLength(255),

                Forms\Components\TextInput::make('url')
                    ->label('Destination URL')
                    ->maxLength(255),

                // Forms\Components\RichEditor::make('blog'),

                Forms\Components\Select::make('xtype')
                    ->label('Type of adverts')
                    ->options(AdvertType::class),

                Forms\Components\TextInput::make('sort')
                    ->numeric()
                    ->integer()
                    ->minValue(1)
                    ->maxValue(127),
                
                Forms\Components\TagsInput::make('tags')
                    ->label('SEO Tags')
                    ->helperText('Add key words to help search engine indexing. Press the [ Enter ] key after each keyword or phrase.'),
                
                Forms\Components\FileUpload::make('image')
                    ->label('Upload Banner Image')
                    ->image()
                    ->disk('local')
                    ->directory('public/adverts')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        $date = time().'-';
                        return (string) Str::of($file->getClientOriginalName())->prepend($date);
                    })
                    ->helperText('Recommended size for top banner is 728px x 90px, while side button is 300px x 250px.'),

                Forms\Components\Toggle::make('status')
                    ->required(),
            ]);
    }
}
