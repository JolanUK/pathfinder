<?php

use Livewire\Component;

new class extends Component
{

};
?>

@php
    $logoLight = config('style.logoLight') ?? ''; 
    $logoDark = config('style.logoDark') ?? ''; 
@endphp

<div>
    <div class="fi-footer py-4 lg:flex bg-brand-secondary dark:bg-brand-dark-secondary text-white relative z-5">
        <div class="w-full px-6 lg:px-8">
            <div class="w-full mx-auto flex items-center flex-nowrap md:flex-wrap gap-6 md:gap-6 md:justify-between">
                <nav class="flex gap-12 md:gap-12 flex-wrap md:flex-nowrap">
                    <img class="max-w-42 dark:hidden" src="{{ asset($logoLight) }}" />
                    <img class="max-w-42 hidden dark:block" src="{{ asset($logoDark) }}" />
                </nav>

                <nav x-data="{ mobileMenuIsOpen: false }" x-on:click.away="mobileMenuIsOpen = false" class="flex items-center justify-between py-4">
                    <!-- Desktop Menu -->
                    <ul class="hidden items-center gap-4 lg:gap-6 lg:flex">
                        <li><a href="#" class="text-lg tracking-wide">Footer stuff?</a></li>
                        <li></li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>
</div>