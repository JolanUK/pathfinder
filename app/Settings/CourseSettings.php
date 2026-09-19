<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class CourseSettings extends Settings
{
    public $courseTypes;

    public static function group(): string
    {
        return 'course';
    }
}
