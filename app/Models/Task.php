<?php

namespace App\Models;

use Database\Factories\TaskFactory;
use Guava\Calendar\Contracts\Eventable;
use Guava\Calendar\ValueObjects\CalendarEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model implements Eventable
{
    /** @use HasFactory<TaskFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'creator',
        'resources',
    ];

    public function taskCreator(): HasMany
    {
        return $this->hasMany(User::class, 'creator')
            ->role('staff');
    }

    public function taskResources(): HasMany
    {
        return $this->hasMany(User::class, 'resources')
            ->role('staff');
    }

    public function toCalendarEvent(): CalendarEvent
    {
        return CalendarEvent::make($this)
            ->title($this->title)
            ->start($this->start_date)
            ->end($this->end_date)
            ->backgroundColor('green');
    }

    protected $casts = [
        'creator' => 'json',
        'resources' => 'json',
    ];
}
