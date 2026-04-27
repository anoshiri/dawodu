<?php

namespace App\Enums;

enum AdvertType: int
{
    case TopBanner = 1;
    case SideButton = 2;

    public function label(): string
    {
        return match ($this) {
            AdvertType::TopBanner => 'Top banner',
            AdvertType::SideButton => 'Side button',
        };
    }
}
