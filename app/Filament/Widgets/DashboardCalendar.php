<?php

namespace App\Filament\Widgets;

use App\Models\Module;
use App\Models\Task;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Guava\Calendar\Concerns\CanRefreshCalendar;
use Guava\Calendar\Filament\CalendarWidget;
use Guava\Calendar\ValueObjects\FetchInfo;
use Illuminate\Support\HtmlString;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class DashboardCalendar extends CalendarWidget
{
    use CanRefreshCalendar, InteractsWithPageFilters;

    protected bool $dateClickEnabled = true;

    protected bool $dateSelectEnabled = true;

    protected bool $datesSetEnabled = true;

    protected ?string $defaultEventClickAction = 'view';

    protected bool $eventAllUpdatedEnabled = true;

    protected bool $eventClickEnabled = true;

    protected bool $viewDidMountEnabled = true;

    protected int | string | array $columnSpan = 'full';

    protected function eventContent(): HtmlString | string
    {
        return view('filament.calendars.event')->render();
    }

    public static function canView(): bool
    {
        return Auth::user()->hasRole('technical_admin') ?? false;
    }

    public function getOptions(): array
    {
        return [
            'headerToolbar' => [
                'start' => 'title',
                'center' => 'dayGridMonth,timeGridWeek,listWeek,listDay',
                'end' => 'today prev,next',
            ],
            'hiddenDays' => [0, 6]
        ];
    }

    protected function getEvents(FetchInfo $info): Collection|array|Builder
    {
        return collect()
            ->push(...Task::query()->where('start_date', '>=', $info->start)->where('start_date', '<=', $info->end)->get())
            ->push(...Module::query()->where('start', '>=', $info->start)->where('end', '<=', $info->end)->get());
    }
}
