<?php

namespace App\Filament\Resources\Events\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                TextInput::make('subject')
                    ->label('Event name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('venue')
                    ->label('Name of Venue')
                    ->required()
                    ->maxLength(255),

                DatePicker::make('start_date')
                    ->maxDate(fn (Get $get) => $get('end_date'))
                    ->required(),

                TimePicker::make('start_time')
                    ->required()
                    ->displayFormat(config('dawodu.timeFormat')),

                DatePicker::make('end_date')
                    ->minDate(fn (Get $get) => $get('start_date'))
                    ->required(),

                TimePicker::make('end_time')
                    ->required()
                    ->displayFormat(config('dawodu.timeFormat')),

                TextInput::make('contact_person')
                    ->maxLength(255),

                TextInput::make('email')
                    ->email()
                    ->maxLength(255),

                TextInput::make('phone')
                    ->tel()
                    ->maxLength(255),

                TextInput::make('address')
                    ->maxLength(255),

                TextInput::make('locality')
                    ->maxLength(255)
                    ->label('Address line 2'),

                TextInput::make('city')
                    ->maxLength(255),

                TextInput::make('code')
                    ->maxLength(255)
                    ->label('Postal code'),

                TextInput::make('state')
                    ->maxLength(255),

                Select::make('country')
                    ->required()
                    ->options(config('dawodu.countries')),

                RichEditor::make('blog')
                    ->label('Event Description'),


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

                TagsInput::make('tags')
                    ->label('SEO Tags')
                    ->helperText('Add key words to help search engine indexing. Press the [ Enter ] key after each keyword or phrase.'),

                FileUpload::make('image')
                    ->label('Add Event Logo or Image')
                    ->image()
                    ->disk('local')
                    ->directory('public/events')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        $date = time().'-';
                        return (string) Str::of($file->getClientOriginalName())->prepend($date);
                    }),

                FileUpload::make('documents')
                    ->disk('local')
                    ->multiple()
                    ->directory('public/events')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        $date = time().'-';
                        return (string) Str::of($file->getClientOriginalName())->prepend($date);
                    })
                    ->helperText('Add Event Document/flyer (PDF only). Add as many documents as needed.'),

                Toggle::make('status')
                    ->required(),
            ]);
    }
}
