<x-filament-panels::page>
    <div class="fi-panel fi-panel-custom">
        <div class="fi-panel-ctn">
            <div class="fi-panel-heading">{{ __('At a glance') }}</div>
            <div class="fi-panel-content-ctn">
                <div class="w-full text-base">
                    {{ $this->getRecord()->excerpt }}
                </div>

                <div class="w-full mt-1">
                    <span class="text-content-primary/5 dark:text-white text-xs mb-2">
                        {{ $this->record->dateRange }}
                    </span>
                </div>

                @php
                    $courses = $this->getRecord()->courses()->get();
                    $enrolments = $this->getRecord()->enrolments()->get();
                    $participants = $this->getRecord()->participants()->get();
                @endphp

                <div class="w-full mt-2">
                    <div class="flex flex-col lg:flex-row divide lg:divide-none divide-y divide-gray-200 dark:divide-gray-800 lg:gap-6">

                        {{-- Course Breakdown --}}
                        <div class="flex flex-col py-2">
                            <div class="flex gap-2 items-start text-md">
                                {{ __("Courses") }}
                                
                                <x-filament::badge color="info" size="sm">
                                    {{ count($courses) }}
                                </x-filament::badge>     
                            </div>
                        </div>

                        {{-- Enrolment Breakdown --}}
                        <div class="flex py-2">
                            <div class="flex gap-2 items-start text-md">
                                {{ __("Enrolments") }} 
                                
                                <x-filament::badge color="info" size="sm">
                                    {{ count($enrolments) }}
                                </x-filament::badge>     
                            </div>
                        </div>

                        {{-- Enrolment Breakdown --}}
                        <div class="flex py-2">
                            <div class="flex gap-2 items-start text-md">
                                {{ __("Participants") }} 
                                
                                <x-filament::badge color="info" size="sm">
                                    {{ count($participants) }}
                                </x-filament::badge>     
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-filament-panels::page>