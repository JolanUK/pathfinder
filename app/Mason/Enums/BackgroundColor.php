<?php

declare(strict_types=1);

namespace App\Mason\Enums;

use Filament\Support\Contracts\HasLabel;

enum BackgroundColor: string implements HasLabel
{
    case LayoutPrimary = 'layoutPrimary';
    case LayoutSecondary = 'layoutSecondary';
    case Primary = 'primary';

    public function getLabel(): string
    {
        return match ($this) {
            self::LayoutPrimary => 'Layout - Primary',
            self::LayoutSecondary => 'Layout - Secondary',
            self::Primary => 'Primary',
        };
    }
}
