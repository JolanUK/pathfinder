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
            @php 
                $groups = collect($this->activities->groupBy('batch_uuid'));

                $first = $this->activities->first();
            @endphp

            @foreach($groups as $batchUuid => $activities)
                @php 
                    $groupsByAction = collect($activities->groupBy('event'));
                @endphp
                
                <div class="w-full py-3 first-of-type:pt-0 items-start justify-between">
                    <span class="text-base text-content-primary dark:text-content-primary-dark block">

                        <span class="text-(--tertiaryLight-500)">{{ $activities->first()->causer->name }}</span>
                        <span>{{ __('adjusted ') . count($activities) . ' records within ' . $activities->first()->subject->course()->first()->title }}</span>

                        @if($groupsByAction)
                            {{ '(' }}
                                @foreach($groupsByAction as $key => $group)
                                    {{ $key . ': ' . count($group) }}
                                @endforeach
                            {{ ')' }}
                        @endif

                    </span>

                    <span class="text-sm text-content-primary/50 dark:text-content-primary-dark/50">
                        {{ \Carbon\Carbon::parse($activities->first()->created_at)->diffForHumans() }}
                    </span>
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