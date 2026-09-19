<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\DashboardCalendar;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Schemas\Schema;
use Guava\Calendar\Concerns\CanRefreshCalendar;
use Override;

class Dashboard extends BaseDashboard
{
    use CanRefreshCalendar, HasFiltersForm;

    #[Override]
    protected function getFooterWidgets(): array
    {
        return [
            DashboardCalendar::class,
        ];
    }

    #[Override]
    protected function getHeaderWidgets(): array
    {
        return [

        ];
    }

    #[Override]
    public function content(Schema $schema): Schema
    {
        return $schema
            ->components([
                ...(method_exists($this, 'getFiltersForm') ? [$this->getFiltersFormContentComponent()] : []),
            ]);
    }
}
