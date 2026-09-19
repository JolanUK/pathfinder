<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GlobalSettings extends Settings
{
    public string $appName;

    public $currentTerm;

    public static function group(): string
    {
        return 'global';
    }
}
