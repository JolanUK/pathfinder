<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum SubjectPronouns: string implements HasLabel
{
    case She = 'She';
    case He = 'He';
    case They = 'They';
    case It = 'It';

    public function getLabel(): string|Htmlable|null
    {
        return $this->value;
    }
}
