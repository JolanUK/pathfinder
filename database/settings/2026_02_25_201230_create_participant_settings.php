<?php

use App\Enums\AgeRanges;
use App\Enums\Ethnicities;
use App\Enums\Genders;
use App\Enums\ObjectPronouns;
use App\Enums\Referrers;
use App\Enums\SubjectPronouns;
use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('participant.ageRanges', AgeRanges::cases());
        $this->migrator->add('participant.ethnicities', Ethnicities::cases());
        $this->migrator->add('participant.genders', Genders::cases());
        $this->migrator->add('participant.minimumAge', 18);
        $this->migrator->add('participant.objectPronouns', ObjectPronouns::cases());
        $this->migrator->add('participant.referrers', Referrers::cases());
        $this->migrator->add('participant.subjectPronouns', SubjectPronouns::cases());
    }
};
