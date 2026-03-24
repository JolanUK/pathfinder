<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;

    protected $fillable = [
        'course_type',
        'title',
        'excerpt',
        'minimum_participants',
        'maximum_participants'
    ];

    protected $attributes = [
        'prospectuses' => '[]',
    ];

    // Top-level bits, no filtering
    public function prospectuses(): BelongsToMany
    {
        return $this->belongsToMany(Prospectus::class, 'courses_prospectuses');
    }

    public function modules(): HasMany
    {
        return $this->hasMany(Module::class, 'course_id');
    }

    // Check if we're inside the current prospectus
    public function belongsToCurrentProspectus(): BelongsToMany
    { 
        $prospectus = config('settings.prospectus');

        return $this->belongsToMany(Prospectus::class, 'courses_prospectuses')
            ->where('prospectuses.id', $prospectus);
    }

    // Next current module
    public function nextModule(): HasOne
    {
        return $this->hasOne(Module::class, 'course_id')
            ->where('start_date', '>=', now())
            ->limit(1);
    }

    // Enrolments within the current prospectus
    public function activeEnrolments(): HasMany
    {
        // How many enrolments are there for the current model within the current prospectus?
        $prospectus = config('settings.prospectus');

        return $this->hasMany(Enrolment::class, 'course_id');
            // ->whereHas('prospectuses', 
            //     function (Builder $query) {
            //         $query->where('id', '=', 'code%');
            //     }
            // )
            //->where('prospectus_id', 'contains', $prospectus);
    }

    protected $casts = [
        'content' => 'json'
    ];
}
