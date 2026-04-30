<?php

namespace App\Enums;

enum GovernmentOfficialType: int
{
    case StateGovernor = 1;
    case FederalSenator = 2;
    case FederalRepresentative = 3;
    case HeadOfGovernment = 4;

    public function label(): string
    {
        return match ($this) {
            GovernmentOfficialType::StateGovernor => 'State Governor',
            GovernmentOfficialType::FederalSenator => 'Federal Senator',
            GovernmentOfficialType::FederalRepresentative => 'Federal Representative',
            GovernmentOfficialType::HeadOfGovernment => 'Head of Government',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn (self $case) => [$case->value => $case->label()])
            ->all();
    }
}
