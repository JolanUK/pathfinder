<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum NavigationGroups: string implements HasLabel
{
    case Content = 'content';
    case Courses = 'courses';
    case Team = 'team';
    case Participant = 'participant';
    case Participation = 'participation';
    case Settings = 'settings';
    case Workflow = 'workflow';

    public function getLabel(): string|Htmlable|null
    {
        return match ($this) {
            self::Content => 'Content',
            self::Courses => 'Courses',
            self::Team => 'My Team',
            self::Participant => 'My Participant Profile',
            self::Participation => 'Participation',
            self::Settings => 'Settings',
            self::Workflow => 'Workflow'
        };
    }
}
