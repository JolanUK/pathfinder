<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum TaskStatuses: string implements HasLabel
{
    case Open = 'Open';
    case InProgress = 'In Progress';
    case OnHold = 'On Hold';
    case Closed = 'Closed';

    public function getLabel(): string|Htmlable|null
    {
        return $this->value;
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Open => 'info',
            self::InProgress => 'primary',
            self::OnHold => 'danger',
            self::Closed => 'success',
        };
    }
}
