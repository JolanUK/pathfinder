<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;

class AdminDashboardNavigationWidget extends Widget
{
    public array $roles;

    public array $capabilities;

    protected int | string | array $columnSpan = 'full';

    public function mount() {
        $this->roles = Auth::user()->roles()->pluck('name')->toArray();
    }

    protected string $view = 'filament.widgets.admin-dashboard-navigation-widget';
}
