<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum TermStatuses: string implements HasColor, HasLabel
{
    case Upcoming = 'Upcoming';
    case Live = 'Live';
    case Passed = 'Passed';

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Upcoming => 'info',
            self::Live => 'success',
            self::Passed => 'warning',
        };
    }

    public function getLabel(): string
    {
        return $this->name;
    }
}
