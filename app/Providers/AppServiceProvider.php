<?php

namespace App\Providers;

use App\Faker\PostcodeProvider;
use App\Services\ParticipantService;
use App\Settings\GlobalSettings;
use Carbon\CarbonImmutable;
use Faker\Factory;
use Filament\Forms\Components\DateTimePicker;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Spatie\Activitylog\Facades\Activity;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Participant Service
        $this->app->singleton(ParticipantService::class, function ($app) {
            return new ParticipantService;
        });

        // Faker
        $this->app->singleton('faker', function ($app) {
            $faker = Factory::create();
            $faker->addProvider(new PostcodeProvider($faker));

            return $faker;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(GlobalSettings $settings): void
    {
        $this->configureDefaults();

        DateTimePicker::configureUsing(function (DateTimePicker $picker): void {
            $picker->displayFormat('d/m/Y');
        });

        Gate::before(function ($user, $ability) {
            return $user->hasRole('technical_manager') ? true : null;
        });

        // Activity logging
        $batchUuid = (string) Str::uuid();

        Activity::beforeLogging(function ($activity) use ($batchUuid) {
            $activity->batch_uuid = $batchUuid;
        });

        Activity::beforeLogging(function (\Spatie\Activitylog\Contracts\Activity $activity) {
            $activity->properties = $activity->properties->put('ip', request()->ip());
        });
    }

    /**
     * Configure default behaviors for production-ready applications.
     */
    protected function configureDefaults(): void
    {
        Date::use(CarbonImmutable::class);

        DB::prohibitDestructiveCommands(
            app()->isProduction(),
        );

        Password::defaults(fn (): ?Password => app()->isProduction()
            ? Password::min(12)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised()
            : null
        );
    }
}
