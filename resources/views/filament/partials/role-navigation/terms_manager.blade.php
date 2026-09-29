<?php

use App\Models\User;
use App\Models\Term;
use App\Filament\Resources\Terms\TermResource;
use App\Settings\GlobalSettings;
use Carbon\Carbon;
use Livewire\Component;
use Spatie\Activitylog\Models\Activity;

new class extends Component 
{
    public string $currentTermSetting;

    public $currentTerm;

    public function mount() {
        $this->currentTermSetting = app(GlobalSettings::class)->currentTerm;

        $this->currentTerm = Term::findOrFail($this->currentTermSetting)->first();
    }  
};
?>

<div class="w-full flex flex-col">
    <div class="flex flex-col gap-1">
        <div class="flex gap-4 items-start">
            <span class="text-base font-normal theme-text">{{ __('Current Term:') }} {{ $this->currentTerm->title }}</span>
    
            <x-filament::badge color="success" size="sm" class="mt-1">
                {{ __('LIVE') }}
            </x-filament::badge>
        </div>
    
        <span class="text-content-primary/50 dark:text-white/50 text-xs mb-2">
            {{ $this->currentTerm->dateRange }}

            <span class="font-italic">({{ Carbon::parse($this->currentTerm->end)->diffForHumans() }})</span>
        </span>
    </div>

    <div class="w-full mt-2">
        <div class="flex flex-col lg:flex-row divide lg:divide-none divide-y divide-gray-200 dark:divide-gray-800 lg:gap-6">

            {{-- Course Breakdown --}}
            <div class="flex py-2">
                <div class="flex gap-2 items-start text-base">
                    {{ __("Courses") }} 
                    
                    <x-filament::badge color="info" size="sm" class="mt-1">
                        {{ count($this->currentTerm->courses) }}
                    </x-filament::badge>     
                </div>
            </div>

            {{-- Enrolment Breakdown --}}
            <div class="flex py-2">
                <div class="flex gap-2 items-start text-base">
                    {{ __("Enrolments") }} 
                    
                    <x-filament::badge color="info" size="sm" class="mt-1">
                        {{ count($this->currentTerm->enrolments) }}
                    </x-filament::badge>     
                </div>
            </div>

            {{-- Participant Breakdown --}}
            <div class="flex py-2">
                <div class="flex gap-2 items-start text-base">
                    {{ __("Participants") }} 
                    
                    <x-filament::badge color="info" size="sm" class="mt-1">
                        {{ count($this->currentTerm->participants) }}
                    </x-filament::badge>     
                </div>
            </div>
            
        </div>
    </div>

    <x-slot name="footer">
        <div class="flex justify-end gap-4">
            <x-filament::button
                size="sm"
                class="fi-btn-empty text-(--tertiaryLight-500)"
                color="primary"
                href="{{ route('terms.single', ['slug' => $this->currentTerm->slug]) }}"
                tag="a"
            >
                {{ __('View') }}
            </x-filament::button>

            <x-filament::button
                size="sm"
                href="{{ TermResource::getUrl('edit', ['record' => $this->currentTerm]) }}"
                color="primary"
                tag="a"
            >
                {{ __('Edit') }}
            </x-filament::button>
        </div>
    </x-slot>
</div>