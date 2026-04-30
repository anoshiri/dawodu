<?php

namespace App\Enums;

enum SiteLinkType: int
{
    case GovernmentSite = 1;
    case PoliticiansSite = 2;
    case GeneralLink = 3;
    case PoliticalParty = 4;
    case InfoLinks = 5;

    public function label(): string
    {
        return match ($this) {
            SiteLinkType::GovernmentSite => 'Government Site',
            SiteLinkType::PoliticiansSite => 'Politicians Site',
            SiteLinkType::GeneralLink => 'General Link',
            SiteLinkType::PoliticalParty => 'Political Party',
            SiteLinkType::InfoLinks => 'Info Links',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn (self $case) => [$case->value => $case->label()])
            ->all();
    }
}
