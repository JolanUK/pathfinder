<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Enrolment extends Model
{
    /** @use HasFactory<\Database\Factories\EnrolmentFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'prospectus_id',
        'course_id',
        'type',
        'objectives',
        'objectives_other',
        'status'
    ];

    public function enrolmentCourse(): HasOne
    {
        return $this->hasOne(Course::class, 'id', 'course_id');
    }

    public function enrolmentProspectus(): HasOne
    {
        return $this->hasOne(Prospectus::class, 'id', 'prospectus_id');
    }

    public function enrolmentAttendances(): HasMany
    {
        return $this->hasMany(Attendance::class, 'enrolment_id', 'id');
    }

    public function enrolmentParticipant(): HasOne
    {
        return $this->hasOne(Participant::class, 'id', 'user_id');
    }

    protected $casts = [
        'objectives' => 'array'
    ];
}
