<?php

namespace App\Filament\Resources\Videos\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class VideoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                
                DatePicker::make('publication_date'),
                
                TextInput::make('url')
                    ->required()
                    ->maxLength(255),
                
                TagsInput::make('sites')
                    ->label('Publish Video on')
                    ->suggestions(config('dawodu.sites'))
                    ->helperText('Select Site(s) to publish the video on'),

                RichEditor::make('blog')
                    ->label('Summary/Description'),

                Toggle::make('featured'),

                TextInput::make('sort')
                    ->label('Sort Order')
                    ->numeric()
                    ->integer()
                    ->minValue(1)
                    ->maxValue(127)
                    ->helperText('Optional - To override default sort order, newest videos are listed first.'),
                
                TagsInput::make('tags')
                    ->label('SEO Tags')
                    ->helperText('Add key words to help search engine indexing. Press the [ Enter ] key after each keyword or phrase'),
                
                // FileUpload::make('image')
                //     ->label('Video Cover Image')
                //     ->image()
                //     ->disk('local')
                //     ->directory('public/videos')
                //     ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                //         $date = time().'-';
                //         return (string) Str::of($file->getClientOriginalName())->prepend($date);
                //     })
                //     ->helperText('Optional - Add custom video cover'),

                Toggle::make('status')
                    ->required(),
            ]);
    }
}
