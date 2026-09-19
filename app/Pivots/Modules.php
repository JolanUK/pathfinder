<?php

namespace App\Pivots;

use App\Models\Course;
use App\Models\Term;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Modules extends Pivot
{
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function terms()
    {
        return $this->hasManyThrough(Term::class, Course::class);
    }
}
