<?php

namespace App\Models;

use Database\Factories\ModuleFactory;
use Guava\Calendar\Contracts\Eventable;
use Guava\Calendar\ValueObjects\CalendarEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model implements Eventable
{
    /** @use HasFactory<ModuleFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'excerpt',
        'start',
        'end',
    ];

    public function course()
    {
        return $this->belongsToMany(Course::class, 'terms_modules', 'module_id');
    }

    public function enrolment()
    {
        return $this->belongsTo(Enrolment::class);
    }

    // Parent course type
    public function getCourseColourAttribute()
    {
        $course = collect($this->course);

        return $course->first()->course_type === 'DropIn' ? 'blue' : 'orange';
    }

    public function toCalendarEvent(): CalendarEvent
    {
        return CalendarEvent::make($this)
            ->title($this->title)
            ->start($this->start)
            ->end($this->end)
            ->backgroundColor($this->course_colour);
    }
}
