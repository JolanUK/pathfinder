<?php

namespace App\Filament\Resources\Terms\Widgets;

use App\Models\Term;
use Filament\Widgets\ChartWidget;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TermDemographicChart extends ChartWidget
{
    protected ?string $heading = 'Demographics';

    public ?string $filter = 'age';

    public ?Term $record = null;

    public ?HasMany $participants = null;

    protected int|string|array $columnSpan = 'full';

    protected function getFilters(): ?array
    {
        return [
            'age' => 'Age',
            'ethnicity' => 'Ethnicity',
            'gender' => 'Gender',
        ];
    }

    protected function getData(): array
    {
        $activeFilter = $this->filter;

        $participants = $this->record->participants()
            ->get()
            ->groupBy($activeFilter)
            ->sortKeys();

        $labels = [];
        $data = [];

        foreach ($participants as $participantId => $participantGroup) {
            if ($participantId) {
                $labels[] = $participantId;
            }

            $data[] = $participantGroup->count();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Age Spread',
                    'data' => $data,
                    'backgroundColor' => '#e6186d',
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'r' => [
                    'ticks' => [
                        'stepSize' => 1,
                        'precision' => 0,
                    ],
                ],
            ],
            'plugins' => [
                'legend' => [
                    'display' => false,
                ],
            ],
        ];
    }
}
