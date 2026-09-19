<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum YesNo: string implements HasLabel
{
    case Yes = 'Yes';

    case No = 'No';

    public function getLabel(): string|Htmlable|null
    {
        return $this->value;
    }
}
