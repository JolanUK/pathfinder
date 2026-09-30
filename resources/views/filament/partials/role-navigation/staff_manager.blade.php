<?php

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Spatie\Activitylog\Models\Activity;

new class extends Component 
{
   
};
?>

<div>
    <div class="divide-y divide-keyline-primary dark:divide-keyline-primary-dark">
        <x-filament::link
            class="w-full py-3 first-of-type:pt-0 items-start justify-between"
            icon="heroicon-m-chevron-right"
            icon-position="after"
        >
            <span class="text-base text-content-primary dark:text-content-primary-dark">{{ __('Staff availability for today') }}</span>

            <x-filament::badge color="info" class="ml-2">
                4
            </x-filament::badge>

        </x-filament::link>

        <x-filament::link
            class="w-full py-3 first-of-type:pt-0 items-start justify-between"
            icon="heroicon-m-chevron-right"
            icon-position="after"
        >
            <span class="text-base text-content-primary dark:text-content-primary-dark">{{ __('Active volunteer applications') }}</span>

            <x-filament::badge color="info" class="ml-2">
                4
            </x-filament::badge>

        </x-filament::link>

        <x-filament::callout
            class="mt-2"
            icon="heroicon-o-exclamation-circle"
            color="warning"
        >
            <x-slot name="heading">
                TODO: Flesh out this area
            </x-slot>
        </x-filament::callout>
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