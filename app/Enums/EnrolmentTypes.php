<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum EnrolmentTypes: string implements HasLabel
{
    case Participant = 'Participant';
    case Staff = 'Staff';

    public function getLabel(): string|Htmlable|null
    {
        return $this->name;
    }
}
