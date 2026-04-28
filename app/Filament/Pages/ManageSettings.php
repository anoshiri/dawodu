<?php

namespace App\Filament\Pages;

use App\Settings\GeneralSettings;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\EmbeddedSchema;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class ManageSettings extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string|\UnitEnum|null $navigationGroup = 'Admin Settings';

    protected static ?string $navigationLabel = 'General Settings';

    protected static ?int $navigationSort = 1;

    protected string $view = 'filament.pages.manage-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $settings = app(GeneralSettings::class);

        $this->form->fill([
            'street' => $settings->street,
            'locality' => $settings->locality,
            'city' => $settings->city,
            'state' => $settings->state,
            'code' => $settings->code,
            'country' => $settings->country,
            'phone' => $settings->phone,
            'email' => $settings->email,
            'twitter' => $settings->twitter,
            'facebook' => $settings->facebook,
            'instagram' => $settings->instagram,
            'tiktok' => $settings->tiktok,
            'linkedin' => $settings->linkedin,
            'whatsapp' => $settings->whatsapp,
            'youtube' => $settings->youtube,
            'news_rss_feed' => $settings->news_rss_feed,
        ]);
    }

    public function content(Schema $schema): Schema
    {
        return $schema->components([
            Form::make([EmbeddedSchema::make('form')])
                ->id('form')
                ->livewireSubmitHandler('save')
                ->footer([
                    Actions::make($this->getFormActions()),
                ]),
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->components([
                Section::make('Contact Information')
                    ->columns(2)
                    ->schema([
                        TextInput::make('street')->label('Street Address'),
                        TextInput::make('locality')->label('P.O. Box / Locality'),
                        TextInput::make('city'),
                        TextInput::make('state'),
                        TextInput::make('code')->label('Zip / Postal Code'),
                        TextInput::make('country'),
                        TextInput::make('phone')->tel(),
                        TextInput::make('email')->email(),
                    ]),

                Section::make('Social Media')
                    ->columns(2)
                    ->schema([
                        TextInput::make('twitter')->url()->label('Twitter'),
                        TextInput::make('facebook')->url()->label('Facebook'),
                        TextInput::make('instagram')->url()->label('Instagram'),
                        TextInput::make('tiktok')->url()->label('TikTok'),
                        TextInput::make('linkedin')->url()->label('LinkedIn'),
                        TextInput::make('whatsapp')->label('WhatsApp'),
                        TextInput::make('youtube')->url()->label('YouTube'),
                    ]),

                Section::make('System')
                    ->schema([
                        TextInput::make('news_rss_feed')->url()->label('News RSS Feed')->columnSpanFull(),
                    ]),
            ]);
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Save Settings')
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $settings = app(GeneralSettings::class);
        $settings->street = $data['street'];
        $settings->locality = $data['locality'];
        $settings->city = $data['city'];
        $settings->state = $data['state'];
        $settings->code = $data['code'];
        $settings->country = $data['country'];
        $settings->phone = $data['phone'];
        $settings->email = $data['email'];
        $settings->twitter = $data['twitter'];
        $settings->facebook = $data['facebook'];
        $settings->instagram = $data['instagram'];
        $settings->tiktok = $data['tiktok'];
        $settings->linkedin = $data['linkedin'];
        $settings->whatsapp = $data['whatsapp'];
        $settings->youtube = $data['youtube'];
        $settings->news_rss_feed = $data['news_rss_feed'];
        $settings->save();

        Notification::make()
            ->title('Settings saved')
            ->success()
            ->send();
    }
}
