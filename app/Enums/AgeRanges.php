<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum AgeRanges: string implements HasLabel
{
    case EighteenToTwentySeven = '18-27';
    case TwentyEightToThirtySeven = '28-37';
    case ThirtyEightToFortySeven = '38-47';
    case FortyEightToFiftySeven = '48-57';
    case FiftyEightToSixtySeven = '58-67';
    case SixtyEightToSeventySeven = '68-77';
    case SeventyEightToEightySeven = '78-87';
    case EightyEightToNinetySeven = '88-97';

    public function getLabel(): string|Htmlable|null
    {
        return $this->value;
    }
}
