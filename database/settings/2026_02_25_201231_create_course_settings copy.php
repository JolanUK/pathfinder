<?php

use App\Enums\CourseTypes;
use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('course.courseTypes', CourseTypes::cases());
    }
};
