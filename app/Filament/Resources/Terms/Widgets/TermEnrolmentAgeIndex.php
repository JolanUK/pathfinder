<?php

namespace App\Filament\Resources\Terms\Widgets;

use App\Models\Course;
use App\Models\Term;
use Filament\Widgets\ChartWidget;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TermEnrolmentAgeIndex extends ChartWidget
{
    protected ?string $heading = 'Age Range Spread';

    public ?Term $record = null;

    public ?HasMany $participants = null;

    protected function getData(): array
    {
        $participants = $this->record->participants()
            ->get()
            ->groupBy('age')
            ->sortKeys();

        $labels = [];
        $data = [];
        $colours = [];

        $colourPalette = [
            '#FF9F40', '#FF6384', '#C9CBCF', '#4DC9F6', '#F67019',
            '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF',
        ];

        $colourIndex = 0;

        foreach ($participants as $participantId => $participantGroup) {
            if ($participantId) {
                $labels[] = $participantId;
            }

            // Count the number of enrolments for this course
            $data[] = $participantGroup->count();

            $colours[] = $colourPalette[$colourIndex % count($colourPalette)];
            $colourIndex++;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Age Spread',
                    'data' => $data,
                    'backgroundColor' => $colours,
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
