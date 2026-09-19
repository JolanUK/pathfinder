<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum ObjectPronouns: string implements HasLabel
{
    case Her = 'Her';
    case Him = 'Him';
    case Them = 'Them';
    case It = 'It';

    public function getLabel(): string|Htmlable|null
    {
        return $this->value;
    }
}
