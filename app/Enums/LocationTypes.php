<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum LocationTypes: string implements HasLabel
{
    case InPerson = 'In Person';
    case Online = 'Online';

    public function getLabel(): string|Htmlable|null
    {
        return $this->name;
    }
}
