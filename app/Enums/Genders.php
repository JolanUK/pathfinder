<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum Genders: string implements HasLabel
{
    case Woman = 'Woman';
    case Man = 'Man';
    case NonBinary = 'Non-binary';
    case PreferNotToSay = 'Prefer not to say';
    case Other = 'Other';

    public function getLabel(): string|Htmlable|null
    {
        return $this->value;
    }
}
