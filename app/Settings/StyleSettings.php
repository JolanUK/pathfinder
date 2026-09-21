<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class StyleSettings extends Settings
{
    public ?string $logoLight;

    public ?string $logoDark;

    public ?string $primaryLight;

    public ?string $secondaryLight;

    public ?string $tertiaryLight;

    public ?string $quaternaryLight;

    public ?string $quinaryLight;

    public ?string $senaryLight;

    public ?string $primaryDark;

    public ?string $secondaryDark;

    public ?string $tertiaryDark;

    public ?string $quaternaryDark;

    public ?string $quinaryDark;

    public ?string $senaryDark;

    public static function group(): string
    {
        return 'style';
    }
}
