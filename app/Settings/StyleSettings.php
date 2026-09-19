<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class StyleSettings extends Settings
{
    public $logoLight;

    public $logoDark;

    public $primaryLight;

    public $secondaryLight;

    public $tertiaryLight;

    public $quaternaryLight;

    public $primaryDark;

    public $secondaryDark;

    public $tertiaryDark;

    public $quaternaryDark;

    public static function group(): string
    {
        return 'style';
    }
}
