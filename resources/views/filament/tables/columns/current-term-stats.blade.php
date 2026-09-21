@php
    $courses = $column->getCourses();
    $enrolments = $column->getEnrolments();
    $participants = $column->getParticipants();
@endphp

<div class="w-full mt-2">
    <div class="flex flex-col lg:flex-row divide lg:divide-none divide-y divide-gray-200 dark:divide-gray-800 lg:gap-6">

        {{-- Course Breakdown --}}
        <div class="flex py-2">
            <div class="flex gap-2 items-start text-lg">
                {{ __("Courses") }} 
                
                <x-filament::badge color="info" size="sm" class="mt-1">
                    {{ $courses }}
                </x-filament::badge>     
            </div>
        </div>

        {{-- Enrolment Breakdown --}}
        <div class="flex py-2">
            <div class="flex gap-2 items-start text-lg">
                {{ __("Enrolments") }} 
                
                <x-filament::badge color="info" size="sm" class="mt-1">
                    {{ $enrolments }}
                </x-filament::badge>     
            </div>
        </div>

        {{-- Enrolment Breakdown --}}
        <div class="flex py-2">
            <div class="flex gap-2 items-start text-lg">
                {{ __("Participants") }} 
                
                <x-filament::badge color="info" size="sm" class="mt-1">
                    {{ $participants }}
                </x-filament::badge>     
            </div>
        </div>
        
    </div>
</div>