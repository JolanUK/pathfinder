<?php

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Spatie\Activitylog\Models\Activity;

new class extends Component 
{
    public $activities = [];

    public function mount() {
        $this->activities = Activity::orderBy('created_at', 'DESC')->get();
    }    
};
?>

<div>
    <div class="divide-y divide-keyline-primary dark:divide-keyline-primary-dark">
        @if($this->activities)
            @foreach($this->activities as $activity)
                <div class="w-full py-3 first-of-type:pt-0 items-start justify-between">
                    <span class="text-base text-content-primary dark:text-content-primary-dark block">
                        <span class="text-(--tertiaryLight-500)">{{ $activity->causer->name }}</span>
                        <span>{{ $activity->description . ' ' . $activity->subject_type . ' ' }}</span>
                    </span>
                
                    <span class="text-sm text-content-primary/50 dark:text-content-primary-dark/50">{{ Carbon::parse($activity->created_at)->diffForHumans() }}</span>
                </div>
            @endforeach
        @endif
    </div>

    <x-slot name="footer">
        <div class="flex justify-end gap-4">
            <x-filament::button
                size="sm"
                href="/"
                color="primary"
                tag="a"
            >
                {{ __('View all') }}
            </x-filament::button>
        </div>
    </x-slot>
</div>