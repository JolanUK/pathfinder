<?php

namespace App\Filament\Tables\Columns;

use App\Models\Course;
use App\Models\Enrolment;
use App\Models\Participant;
use Filament\Tables\Columns\Column;

class CurrentTermStats extends Column
{
    public function getCourses()
    {
        static $courses = null;

        if ($courses !== null) {
            return $courses;
        }

        $term = config('global.currentTerm');

        if (! $term) {
            return $courses = collect();
        }

        return $courses = Course::whereHas('terms', function ($query) use ($term) {
            $query->where('terms.id', $term);
        })->count();
    }

    public function getEnrolments()
    {
        static $enrolments = null;

        if ($enrolments !== null) {
            return $enrolments;
        }

        $term = config('global.currentTerm');

        if (! $term) {
            return $enrolments = collect();
        }

        return $enrolments = Enrolment::whereHas('enrolmentTerm', function ($query) {
            // $query->where('term_id', $term);
        })->count();
    }

    public function getParticipants()
    {
        static $participants = null;

        if ($participants !== null) {
            return $participants;
        }

        $term = config('global.currentTerm');

        if (! $term) {
            return $participants = collect();
        }

        return $participants = Participant::whereHas('activeEnrolments')->count();
    }

    protected string $view = 'filament.tables.columns.current-term-stats';
}
