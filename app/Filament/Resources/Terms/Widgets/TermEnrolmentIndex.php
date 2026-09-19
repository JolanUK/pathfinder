<?php

namespace App\Filament\Resources\Terms\Widgets;

use App\Models\Course;
use App\Models\Term;
use Filament\Widgets\ChartWidget;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TermEnrolmentIndex extends ChartWidget
{
    protected ?string $heading = 'Enrolments';

    public ?Term $record = null;

    public ?HasMany $enrolments = null;

    protected function getData(): array
    {
        $enrolments = $this->record->currentEnrolments()->get()->groupBy('course_id');

        $labels = [];
        $data = [];
        $colours = [];

        $colourPalette = [
            '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF',
            '#FF9F40', '#FF6384', '#C9CBCF', '#4DC9F6', '#F67019',
        ];

        $colourIndex = 0;

        foreach ($enrolments as $courseId => $enrolmentGroup) {
            $course = Course::find($courseId);

            if ($course) {
                $labels[] = $course->title;
            } else {
                $labels[] = "Course #{$courseId}";
            }

            $data[] = $enrolmentGroup->count();

            $colours[] = $colourPalette[$colourIndex % count($colourPalette)];
            $colourIndex++;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Enrolments by Course',
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
        return 'polarArea';
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
                    'position' => 'right',
                ],
            ],
        ];
    }
}
