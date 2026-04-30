<?php

namespace App\Enums;

enum NigerianState: int
{
    case Abia = 1;
    case AbujaFct = 2;
    case Adamawa = 3;
    case AkwaIbom = 4;
    case Anambra = 5;
    case Bauchi = 6;
    case Bayelsa = 7;
    case Benue = 8;
    case Borno = 9;
    case CrossRiver = 10;
    case Delta = 11;
    case Ebonyi = 12;
    case Edo = 13;
    case Ekiti = 14;
    case Enugu = 15;
    case Gombe = 16;
    case Imo = 17;
    case Jigawa = 18;
    case Kaduna = 19;
    case Kano = 20;
    case Katsina = 21;
    case Kebbi = 22;
    case Kogi = 23;
    case Kwara = 24;
    case Lagos = 25;
    case Nasarawa = 26;
    case Niger = 27;
    case Ogun = 28;
    case Ondo = 29;
    case Osun = 30;
    case Oyo = 31;
    case Plateau = 32;
    case Rivers = 33;
    case Sokoto = 34;
    case Taraba = 35;
    case Yobe = 36;
    case Zamfara = 37;

    public function label(): string
    {
        return match ($this) {
            NigerianState::Abia => 'Abia',
            NigerianState::AbujaFct => 'Abuja (FCT)',
            NigerianState::Adamawa => 'Adamawa',
            NigerianState::AkwaIbom => 'Akwa Ibom',
            NigerianState::Anambra => 'Anambra',
            NigerianState::Bauchi => 'Bauchi',
            NigerianState::Bayelsa => 'Bayelsa',
            NigerianState::Benue => 'Benue',
            NigerianState::Borno => 'Borno',
            NigerianState::CrossRiver => 'Cross River',
            NigerianState::Delta => 'Delta',
            NigerianState::Ebonyi => 'Ebonyi',
            NigerianState::Edo => 'Edo',
            NigerianState::Ekiti => 'Ekiti',
            NigerianState::Enugu => 'Enugu',
            NigerianState::Gombe => 'Gombe',
            NigerianState::Imo => 'Imo',
            NigerianState::Jigawa => 'Jigawa',
            NigerianState::Kaduna => 'Kaduna',
            NigerianState::Kano => 'Kano',
            NigerianState::Katsina => 'Katsina',
            NigerianState::Kebbi => 'Kebbi',
            NigerianState::Kogi => 'Kogi',
            NigerianState::Kwara => 'Kwara',
            NigerianState::Lagos => 'Lagos',
            NigerianState::Nasarawa => 'Nasarawa',
            NigerianState::Niger => 'Niger',
            NigerianState::Ogun => 'Ogun',
            NigerianState::Ondo => 'Ondo',
            NigerianState::Osun => 'Osun',
            NigerianState::Oyo => 'Oyo',
            NigerianState::Plateau => 'Plateau',
            NigerianState::Rivers => 'Rivers',
            NigerianState::Sokoto => 'Sokoto',
            NigerianState::Taraba => 'Taraba',
            NigerianState::Yobe => 'Yobe',
            NigerianState::Zamfara => 'Zamfara',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn (self $case) => [$case->value => $case->label()])
            ->all();
    }
}
