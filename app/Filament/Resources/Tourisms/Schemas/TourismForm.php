<?php

namespace App\Filament\Resources\Tourisms\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class TourismForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                TextInput::make('title')
                    ->label('Name of Attraction')
                    ->required()
                    ->maxLength(255),

                TextInput::make('location')
                    ->label('City')
                    ->required()
                    ->maxLength(255),

                RichEditor::make('content')
                    ->label('Description / Profile'),

                TextInput::make('url')
                    ->maxLength(255),

                TagsInput::make('open_days')
                    ->suggestions(['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'])
                    ->label('Days open')
                    ->helperText('Select days in order and press the [ Enter ] key after each day selected.'),

                TimePicker::make('open_time')
                    ->label('Opening Time')
                    ->seconds(false)
                    ->displayFormat(config('dawodu.timeFormat')),

                TimePicker::make('close_time')
                    ->label('Closing Time')
                    ->seconds(false)
                    ->displayFormat(config('dawodu.timeFormat')),

                TextInput::make('email')
                    ->email()
                    ->maxLength(255),

                TextInput::make('phone')
                    ->tel()
                    ->maxLength(255),

                TextInput::make('street')
                    ->label('Address')
                    ->maxLength(255),

                TextInput::make('locality')
                    ->maxLength(255),

                TextInput::make('city')
                    ->maxLength(255),

                TextInput::make('state')
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

                FileUpload::make('images')
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatioOptions([
                        '16:9'
                    ])
                    ->rule(Rule::dimensions()->maxWidth(1095)->maxHeight(750))
                    ->multiple()
                    ->disk('local')
                    ->label('Add images')
                    ->directory('public/tourism')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        $date = time().'-';
                        return (string) Str::of($file->getClientOriginalName())->prepend($date);
                    })
                    ->helperText('Recommended image size is 1095x750 pixels. '),

                TagsInput::make('videos')
                    ->label('Add video URLs'),

                TagsInput::make('tags')
                    ->label('SEO Tags')
                    ->helperText('Add key words to help search engine indexing. Enter after each keyword or phrase.'),

                Toggle::make('status')
                    ->required(),
            ]);
    }
}
