<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public ?string $street = null;

    public ?string $locality = null;

    public ?string $city = null;

    public ?string $state = null;

    public ?string $code = null;

    public ?string $country = null;

    public ?string $phone = null;

    public ?string $email = null;

    public ?string $twitter = null;

    public ?string $facebook = null;

    public ?string $instagram = null;

    public ?string $tiktok = null;

    public ?string $linkedin = null;

    public ?string $whatsapp = null;

    public ?string $youtube = null;

    public ?string $news_rss_feed = null;

    public static function group(): string
    {
        return 'general';
    }
}
