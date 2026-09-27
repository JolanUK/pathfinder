<?php

namespace App\Models;

use App\Enums\TaskStatuses;
use Carbon\Carbon;
use Database\Factories\TaskFactory;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentColor;
use Guava\Calendar\Contracts\Eventable;
use Guava\Calendar\ValueObjects\CalendarEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model implements Eventable
{
    /** @use HasFactory<TaskFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start',
        'end',
        'creator',
        'resources',
        'status'
    ];

    public function taskCreator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator')
            ->role('staff');
    }

    public function taskResources(): BelongsTo
    {
        return $this->belongsTo(User::class, 'resources')
            ->role('staff');
    }

    public function getTaskColourAttribute()
    {
        return $this->status->getColor();
    }

    public function toCalendarEvent(): CalendarEvent
    {
        return CalendarEvent::make($this)
            ->title($this->title)
            ->start($this->start)
            ->end($this->end)
            ->backgroundColor($this->task_colour)
            ->extendedProps([
                'course' => $this->title,
                'start' => Carbon::parse($this->start)->format('g:ia'),
                'end' => Carbon::parse($this->end)->format('g:ia'),
            ]);
    }

    protected $casts = [
        'creator' => 'json',
        'resources' => 'json',
        'status' => TaskStatuses::class,
    ];
}
