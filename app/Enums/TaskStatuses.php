<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum TaskStatuses: string implements HasLabel
{
    case Open = 'Open';
    case InProgress = 'InProgress';
    case OnHold = 'OnHold';
    case Closed = 'Closed';

    public function getLabel(): string | Htmlable | null
    {
        return match ($this) {
            self::Open => 'Open',
            self::InProgress => 'In Progress',
            self::OnHold => 'On Hold',
            self::Closed => 'Closed',
        };
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
