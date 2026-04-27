<?php

namespace App\Filament\Resources\NewsSources\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class NewsSourceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                TextInput::make('title')
                    ->label('Publication Name / Source')
                    ->required()
                    ->maxLength(255),

                TextInput::make('url')
                    ->label('Add URL')
                    ->required()
                    ->maxLength(255),
                
                Select::make('xtype')
                    ->label('News Source Category')
                    ->options(config('dawodu.source_type'))
                    ->helperText('Select news source category.'),

                TextInput::make('sort')
                    ->label('Sort Order')
                    ->numeric()
                    ->integer()
                    ->minValue(1)
                    ->maxValue(127)
                    ->helperText('Optional - To Override default alphabetical sort order.'),

                FileUpload::make('image')
                    ->label('Upload Logo')
                    ->image()
                    ->disk('local')
                    ->directory('public/news_sources')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        $date = time().'-';
                        return (string) Str::of($file->getClientOriginalName())->prepend($date);
                    }),

                Toggle::make('status')
                    ->required(),
            ]);
    }
}
