<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum Referrers: string implements HasLabel
{
    case FriendsFamily = 'Friends/family';
    case PriorExperience = 'Prior experience';
    case MentalHealthServices = 'Community or mental health services';
    case HealthProfessional = 'Health professional (eg: counsellor, psychologist)';
    case GP = 'GP, or adjacent clinician';
    case SocialPrescriber = 'Social prescriber';
    case SupportWorker = 'Support worker/carer';
    case Employer = 'Employer';
    case Online = 'Online (eg: web search, social media)';
    case FaithGroup = 'Church or faith group';
    case Other = 'Other';

    public function getLabel(): string|Htmlable|null
    {
        return $this->value;
    }
}
