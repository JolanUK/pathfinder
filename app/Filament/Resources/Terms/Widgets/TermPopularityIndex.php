<?php

namespace App\Filament\Resources\Terms\Widgets;

use App\Models\Attendance;
use App\Models\Enrolment;
use App\Models\Term;
use Filament\Widgets\ChartWidget;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TermPopularityIndex extends ChartWidget
{
    protected ?string $heading = 'Attendances';

    public ?Term $record = null;

    public ?HasMany $attendancesAttended = null;

    public ?HasMany $attendancesAbsent = null;

    protected function getData(): array
    {
        // Get enrolment IDs
        $enrolmentIds = $this->record->currentEnrolments()->pluck('id');

        // Get all attendances for these enrolments in one query
        $attendances = Attendance::whereIn('enrolment_id', $enrolmentIds)
            ->get()
            ->groupBy('enrolment_id');

        // Get all enrolments in one query (to avoid N+1)
        $enrolments = Enrolment::whereIn('id', $enrolmentIds)
            ->with('enrolmentParticipant') // Assuming you have a student relationship
            ->get()
            ->keyBy('id');

        $labels = [];
        $attendedData = [];
        $absentData = [];
        $colours = [];

        $colourPalette = [
            '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF',
            '#FF9F40', '#FF6384', '#C9CBCF', '#4DC9F6', '#F67019',
        ];

        $colourIndex = 0;

        // Loop through each enrolment
        foreach ($enrolmentIds as $enrolmentId) {
            $enrolment = $enrolments->get($enrolmentId);

            if (! $enrolment) {
                continue;
            }

            // Get attendances for this enrolment
            $enrolmentAttendances = $attendances->get($enrolmentId, collect());

            // Count attended vs absent
            $attended = $enrolmentAttendances->where('status', 'Attended')->count();
            $absent = $enrolmentAttendances->where('status', '!=', 'Attended')->count();

            // Skip if no attendances at all
            if ($attended === 0 && $absent === 0) {
                continue;
            }

            // Create a meaningful label (adjust based on your needs)
            $studentName = $enrolment->enrolmentParticipant->full_name ?? 'Unknown Student';
            $labels[] = "{$studentName} (ID: {$enrolmentId})";

            $attendedData[] = $attended;
            $absentData[] = $absent;

            $colours[] = $colourPalette[$colourIndex % count($colourPalette)];
            $colourIndex++;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Attended',
                    'data' => $attendedData,
                    'backgroundColor' => '#36A2EB',
                ],
                [
                    'label' => 'Absent',
                    'data' => $absentData,
                    'backgroundColor' => '#FF6384',
                    'type' => 'line',
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
                    'position' => 'right',
                ],
            ],
        ];
    }
}
