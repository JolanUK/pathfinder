<?php

use App\Providers\AppServiceProvider;
use App\Providers\Filament\AccountPanelProvider;
use App\Providers\Filament\AdminPanelProvider;
use App\Providers\FortifyServiceProvider;
use App\Providers\GlobalSettingsProvider;

return [
    AppServiceProvider::class,
    AccountPanelProvider::class,
    AdminPanelProvider::class,
    FortifyServiceProvider::class,
    GlobalSettingsProvider::class,
];
