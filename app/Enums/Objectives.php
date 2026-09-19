<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum Objectives: string implements HasLabel
{
    case Condition = 'Learn more about my condition';
    case Confidence = 'Gain confidence';

    public function getLabel(): string|Htmlable|null
    {
        return $this->value;
    }
}
