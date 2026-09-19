@php
    $term = config('global.currentTerm');
@endphp

<div class="w-full">
    <div class="flex flex-col gap-1">
        <div class="flex gap-4 items-start">
            <span class="text-lg font-normal">{{ $record->title }}</span>
    
            <x-filament::badge color="info" size="sm" class="mt-1">
                {{ __('UPCOMING') }}
            </x-filament::badge>
        </div>
    
        <span class="text-brand-secondary/50 dark:text-white text-xs mb-2">
            {{ $record->dateRange }}

            <span class="font-italic">({{ __('starting in') }} {{ $record->startingIn }})</span>
        </span>
    </div>
</div>