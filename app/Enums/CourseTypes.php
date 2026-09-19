<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum CourseTypes: string implements HasLabel
{
    case Workshop = 'Workshop';
    case DropIn = 'Drop-In';

    public function getLabel(): string|Htmlable|null
    {
        return $this->name;
    }
}
