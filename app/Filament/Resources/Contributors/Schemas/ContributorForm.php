<?php

namespace App\Filament\Resources\Contributors\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ContributorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Forms\Components\TextInput::make('first_name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('last_name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('suffix')
                    ->maxLength(255),

                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),

                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->maxLength(255),

                Forms\Components\TextInput::make('twitter')
                    ->maxLength(255),

                Forms\Components\TextInput::make('facebook')
                    ->maxLength(255),

                Forms\Components\TextInput::make('instagram')
                    ->maxLength(255),

                Forms\Components\TextInput::make('tiktok')
                    ->maxLength(255),

                Forms\Components\TextInput::make('linkedin')
                    ->maxLength(255),

                Forms\Components\TextInput::make('whatsapp')
                    ->maxLength(255),
                    
                Forms\Components\Textarea::make('comment')
                    ->label('Bio / Profile')
                    ->maxLength(65535),

                Forms\Components\TextInput::make('sort')
                    ->numeric()
                    ->integer()
                    ->minValue(1)
                    ->maxValue(127)
                    ->helperText('Optional - To override default alphabetical sort order.'),
                
                Forms\Components\FileUpload::make('image')
                    ->label('Add Profile Image')
                    ->image()
                    ->disk('local')
                    ->directory('public/contributors')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        $date = time().'-';
                        return (string) Str::of($file->getClientOriginalName())->prepend($date);
                    }),
                    
                Forms\Components\Toggle::make('status')
                    ->required(),
            ]);
    }
}
