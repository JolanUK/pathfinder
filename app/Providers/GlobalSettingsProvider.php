<?php

namespace App\Providers;

use App\Settings\CourseSettings;
use App\Settings\GlobalSettings;
use App\Settings\ParticipantSettings;
use App\Settings\StyleSettings;
use Illuminate\Support\ServiceProvider;

class GlobalSettingsProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Global settings
        config()->set('global', resolve(GlobalSettings::class)->toArray());

        // Participant settings
        config()->set('participant', resolve(ParticipantSettings::class)->toArray());

        // Course settings
        config()->set('course', resolve(CourseSettings::class)->toArray());

        // Style settings
        config()->set('style', resolve(StyleSettings::class)->toArray());
    }
}
