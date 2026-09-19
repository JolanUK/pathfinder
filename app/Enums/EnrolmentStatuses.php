<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum EnrolmentStatuses: string implements HasLabel
{
    case Approved = 'Approved';
    case Waitlist = 'Waitlist';
    case Rejected = 'Rejected';

    public function getLabel(): string|Htmlable|null
    {
        return $this->name;
    }
}
