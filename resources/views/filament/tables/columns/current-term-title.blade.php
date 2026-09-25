@php
    $term = config('global.currentTerm');
@endphp

<div class="w-full">
    <div class="flex flex-col gap-1">
        <div class="flex gap-4 items-start">
            <span class="text-xl font-normal theme-text">{{ $record->title }}</span>
    
            @if((int)$record->id === (int)$term)
                <x-filament::badge color="success" size="sm" class="mt-1">
                    {{ __('LIVE') }}
                </x-filament::badge>
            @endif
        </div>
    
        <span class="text-content-primary/50 dark:text-white/50 text-sm mb-2">
            {{ $record->dateRange }}

            <span class="font-italic">({{ __('ending in') }} {{ $record->timeLeft }})</span>
        </span>
    </div>
</div>