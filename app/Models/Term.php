<?php

namespace App\Models;

use App\Enums\TermStatuses;
use Carbon\Carbon;
use Database\Factories\TermFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Term extends Model
{
    /** @use HasFactory<TermFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'start',
        'end',
        'content',
        'prospectus',
        'excerpt',
    ];

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'terms_courses');
    }

    public function enrolments(): HasMany
    {
        return $this->hasMany(related: Enrolment::class);
    }

    public function participants(): HasManyThrough
    {
        return $this->hasManyThrough(
            Participant::class,
            Enrolment::class,
            'term_id',
            'id',
            'id',
            'user_id'
        );
    }

    // Relating to the current live term, set in the Global Settings
    public function currentEnrolments(): HasMany
    {
        // Current as in, every live enrolment in the currently set term (in the Settings table)
        $term = config('global.currentTerm');

        return $this->hasMany(related: Enrolment::class);
        // ->where('term_id', $term);
    }

    // Attributes
    public function getDateRangeAttribute()
    {
        // Format: [start date] - [end date]
        if (! empty($this->start) and ! empty($this->end)) {
            $start = Carbon::parse($this->start);
            $end = Carbon::parse($this->end);

            return $start->format('d/m/Y').' - '.$end->format('d/m/Y') ?? '';
        }
    }

    public function getStartingInAttribute()
    {
        if (! empty($this->start)) {
            $date = Carbon::parse($this->start);

            return $date->since() ?? '';
        }
    }

    public function getTimeLeftAttribute()
    {
        if (! empty($this->end)) {
            $date = Carbon::parse($this->end);

            return $date->since() ?? '';
        }
    }

    public function getStatusAttribute()
    {
        $term = config('global.currentTerm');

        if ($this->id === $term) {
            return TermStatuses::Live;
        } else {
            if (Carbon::parse($this->end)->isPast()) {
                return TermStatuses::Passed;
            }

            return TermStatuses::Upcoming;
        }
    }

    protected $casts = [
        'content' => 'json',
        'prospectus' => 'json',
    ];
}
