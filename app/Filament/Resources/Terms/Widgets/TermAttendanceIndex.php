<?php

namespace App\Filament\Resources\Terms\Widgets;

use App\Models\Attendance;
use App\Models\Enrolment;
use App\Models\Term;
use Filament\Widgets\ChartWidget;

class TermAttendanceIndex extends ChartWidget
{
    protected ?string $heading = 'Attendances';

    public ?Term $record = null;

    protected function getData(): array
    {
        // Get all course IDs for this term
        $courseIds = $this->record->courses()->pluck('courses.id')->toArray();

        // Get all enrolments for these courses with their relationships
        $enrolments = Enrolment::whereIn('course_id', $courseIds)
            ->with(['enrolmentParticipant', 'enrolmentCourse'])
            ->get();

        // Get all attendances for these enrolments
        $enrolmentIds = $enrolments->pluck('id')->toArray();
        $attendances = Attendance::whereIn('enrolment_id', $enrolmentIds)
            ->get()
            ->groupBy('enrolment_id');

        $labels = [];
        $attendedData = [];
        $absentData = [];
        $enrolledData = [];

        // Group enrolments by course
        $enrolmentsByCourse = $enrolments->groupBy('course_id');

        foreach ($courseIds as $courseId) {
            $courseEnrolments = $enrolmentsByCourse->get($courseId, collect());

            if ($courseEnrolments->isEmpty()) {
                continue;
            }

            // Get the first enrolment to get course title
            $firstEnrolment = $courseEnrolments->first();
            $courseTitle = $firstEnrolment->enrolmentCourse->title ?? 'N/A';

            $totalAttended = 0;
            $totalAbsent = 0;
            $totalEnrolled = $courseEnrolments->count();

            // Count attendances for all enrolments in this course
            foreach ($courseEnrolments as $enrolment) {
                $enrolmentAttendances = $attendances->get($enrolment->id, collect());

                $totalAttended += $enrolmentAttendances->where('status', 'Attended')->count();
                $totalAbsent += $enrolmentAttendances->where('status', '!=', 'Attended')->count();
            }

            // Skip if no attendance records
            if ($totalAttended === 0 && $totalAbsent === 0) {
                continue;
            }

            $labels[] = $courseTitle;
            $attendedData[] = $totalAttended;
            $absentData[] = $totalAbsent;
            $enrolledData[] = $totalEnrolled;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Enrolled',
                    'data' => $enrolledData,
                    'backgroundColor' => '#C9CBCF',
                ],
                [
                    'label' => 'Attended',
                    'data' => $attendedData,
                    'backgroundColor' => '#36A2EB',
                ],
                [
                    'label' => 'Absent',
                    'data' => $absentData,
                    'backgroundColor' => '#FF6384',
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
            'indexAxis' => 'y',
            'elements' => [
                'bar' => [
                    'borderWidth' => 0,
                ],
            ],
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
                    'position' => 'bottom',
                ],
            ],
        ];
    }
}
