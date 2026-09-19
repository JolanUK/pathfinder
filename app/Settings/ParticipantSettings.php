<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class ParticipantSettings extends Settings
{
    public $ageRanges;

    public $courseTypes;

    public $ethnicities;

    public $genders;

    public $minimumAge;

    public $objectPronouns;

    public $referrers;

    public $subjectPronouns;

    public static function group(): string
    {
        return 'participant';
    }
}
