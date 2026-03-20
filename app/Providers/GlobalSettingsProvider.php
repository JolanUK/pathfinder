<?php

namespace App\Providers;

use App\Settings\GlobalSettings;
use App\Settings\ParticipantSettings;
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
        config()->set('participant', resolve(ParticipantSettings::class)->toArray());
    }
}
