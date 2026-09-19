<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum Ethnicities: string implements HasLabel
{
    case Arab = 'Arab';
    case AsianBangladeshi = 'Asian or Asian British - Bangladeshi';
    case AsianChinese = 'Asian or Asian British - Chinese';
    case AsianIndian = 'Asian or Asian British - Indian';
    case AsianNepalese = 'Asian or Asian British - Nepalese';
    case AsianPakistani = 'Asian or Asian British - Pakistani';
    case AsianOther = 'Asian or Asian British - Any other Asian background';
    case BlackAfrican = 'Black or Black British - African';
    case BlackCaribbean = 'Black or Black British - Caribbean';
    case BlackOther = 'Black or Black British - Any other Black background';
    case MixedWhiteArab = 'Mixed - White and Arab';
    case MixedWhiteAsian = 'Mixed - White and Asian';
    case MixedWhiteBlackAfrican = 'Mixed - White and Black African';
    case MixedWhiteBlackCaribbean = 'Mixed - White and Black Caribbean';
    case MixedAny = 'Mixed - Any other Mixed background';
    case WhiteBritish = 'White - British';
    case WhiteEuropean = 'White - European';
    case WhiteIrish = 'White - Irish';
    case WhiteTraveller = 'White - Gypsy or Irish Traveller';
    case WhiteOther = 'White - Any other White background';
    case PreferNotToSay = 'Prefer not to say';
    case Other = 'Other';

    public function getLabel(): string|Htmlable|null
    {
        return $this->value;
    }
}
