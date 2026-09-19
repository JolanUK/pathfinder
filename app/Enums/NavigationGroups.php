<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum NavigationGroups: string implements HasLabel
{
    case Content = 'content';
    case Courses = 'courses';
    case Organisational = 'organisational';
    case Participant = 'participant';
    case Participation = 'participation';
    case Settings = 'settings';
    case Workflow = 'workflow';

    public function getLabel(): string|Htmlable|null
    {
        return match ($this) {
            self::Content => 'Content',
            self::Courses => 'Courses',
            self::Organisational => 'Organisational',
            self::Participant => 'My Participant Profile',
            self::Participation => 'Participation',
            self::Settings => 'Settings',
            self::Workflow => 'Workflow'
        };
    }
}
