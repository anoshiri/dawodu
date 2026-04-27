<?php

namespace App\Filament\Resources\GovernmentOfficials\Schemas;

use App\Models\FederalConstituency;
use App\Models\SenatorialZone;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class GovernmentOfficialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                TextInput::make('salutation')
                    ->maxLength(255),

                TextInput::make('first_name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('last_name')
                    ->required()
                    ->maxLength(255),

                // TextInput::make('other_names')
                //     ->maxLength(255),

                TextInput::make('suffix')
                    ->maxLength(255),

                Select::make('xtype')
                    ->label('Type of Official')
                    ->options(config('dawodu.type_of_government_official'))
                    ->reactive()
                    ->afterStateUpdated(function(callable $set){
                        $set('constituency_id', null);
                    }),

                Select::make('state_id')
                    ->label('State')
                    ->options(config('dawodu.states'))
                    ->required()
                    ->reactive(),

                Select::make('constituency_id')
                    ->label('Constituency/Senatorial Zone')
                    ->options(function(callable $get) {
                        if ($get('xtype') == 3)  {
                            return FederalConstituency::where('state_id', $get('state_id'))->pluck('title', 'id');
                        }

                        return SenatorialZone::where('state_id', $get('state_id'))->pluck('title', 'id');
                    })
                    ->disabled(function(callable $get) {
                        return $get('xtype') == 1;
                    }),

                TextInput::make('position'),

                TextInput::make('email')
                    ->email()
                    ->maxLength(255),

                TextInput::make('phone')
                    ->tel()
                    ->maxLength(255),

                TextInput::make('political_party')
                    ->maxLength(255),

                DatePicker::make('tenure_start')
                    ->required(),

                DatePicker::make('tenure_end'),

                Textarea::make('bio')
                    ->maxLength(65535),

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

                TextInput::make('url')
                    ->maxLength(255),
                
                FileUpload::make('image')
                    ->image()
                    ->disk('local')
                    ->directory('public/government_officials')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        $date = time().'-';
                        return (string) Str::of($file->getClientOriginalName())->prepend($date);
                    }),

                Toggle::make('status')
                    ->required(),
            ]);
    }
}
