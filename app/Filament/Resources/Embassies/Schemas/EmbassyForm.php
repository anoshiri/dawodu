<?php

namespace App\Filament\Resources\Embassies\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TagsInput;
use Filament\Schemas\Schema;

class EmbassyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                TextInput::make('title')
                    ->label('Embassy Name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->maxLength(255),

                TextInput::make('phone')
                    ->maxLength(255),
                    
                TextInput::make('address')
                    ->required()
                    ->maxLength(255),
                    
                TextInput::make('locality')
                    ->maxLength(255),
                    
                TextInput::make('city')
                    ->required()
                    ->maxLength(255),
                    
                TextInput::make('code')
                    ->label('Postal Code')
                    ->maxLength(255),
                    
                TextInput::make('state')
                    ->maxLength(255),
                    
                Select::make('country')
                    ->required()
                    ->options(config('dawodu.countries')),
                    
                TextInput::make('url')
                    ->label('Website URL')
                    ->maxLength(255),
                    
                TagsInput::make('tags')
                    ->label('SEO Tags')
                    ->helperText('Add key words to help search engine indexing. Press the [ Enter ] key after each keyword or phrase'),

                // FileUpload::make('image')
                //     ->image()
                //     ->disk('local')
                //     ->directory('public/embassies')
                //     ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                //         $date = time().'-';
                //         return (string) Str::of($file->getClientOriginalName())->prepend($date);
                //     }),
                    
                Toggle::make('status'),
            ]);
    }
}
