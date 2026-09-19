<?php

namespace App\Models;

use App\Enums\LocationTypes;
use Database\Factories\CourseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder;

class Course extends Model
{
    /** @use HasFactory<CourseFactory> */
    use HasFactory;

    protected $fillable = [
        'course_type',
        'title',
        'excerpt',
        'minimum_participants',
        'maximum_participants',
        'location_type',
        'location',
    ];

    // Top-level bits, no filtering
    public function terms(): BelongsToMany
    {
        return $this->belongsToMany(Term::class, 'terms_courses');
    }

    public function modules(): BelongsToMany
    {
        return $this->belongsToMany(Module::class, 'terms_modules');
    }

    public function facilitators(): HasMany
    {
        return $this->hasMany(Enrolment::class, 'course_id')
            ->where('enrolment_type', '=', 'facilitator');
    }

    // Check if we're inside the current term
    public function belongsToCurrentTerm(): BelongsToMany
    {
        $term = config('global.currentTerm');

        return $this->belongsToMany(Term::class, 'terms_courses')
            ->where('terms.id', $term);
    }

    // Next current module
    public function nextModule(): BelongsToMany
    {
        return $this->belongsToMany(Module::class, 'terms_modules')
            ->where('start', '>', now())
            ->limit(1);
    }

    // Enrolments within the current term
    public function activeEnrolments(): HasMany
    {
        return $this->hasMany(Enrolment::class, 'course_id');
        // ->whereHas('terms',
        //     function (Builder $query) {
        //         $query->where('id', '=', 'code%');
        //     }
        // )
        // ->where('term_id', 'contains', $term);
    }

    protected $casts = [
        'content' => 'json',
        'location_type' => LocationTypes::class,
    ];
}
