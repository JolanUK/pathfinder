<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum AttendanceStatuses: string implements HasLabel
{
    case Attended = 'Attended';
    case AbsentExcused = 'AbsentExcused';
    case AbsentNotExcused = 'AbsentNotExcused';

    public function badgeColour(): string
    {
        return match ($this) {
            self::Attended => 'success',
            self::AbsentExcused => 'info',
            self::AbsentNotExcused => 'danger',
        };
    }

    public function badgeIcon(): string
    {
        return match ($this) {
            self::Attended => 'heroicon-o-check',
            self::AbsentExcused => 'heroicon-o-minus',
            self::AbsentNotExcused => 'heroicon-o-x-mark',
        };
    }

    public function getLabel(): string
    {
        return match ($this) {
            self::Attended => 'Attended',
            self::AbsentExcused => 'Absent, Excused',
            self::AbsentNotExcused => 'Absent, Not Excused',
        };
    }
}
