<?php

use Livewire\Component;

new class extends Component
{

};
?>

{{-- <div class="flex flex-row gap-4 justify-between">
    <div class="flex text-white items-center rounded-sm overflow-hidden">
        <button class="relative group flex items-center justify-center text-center w-10 h-10 leading-1 shadow-sm bg-white/5 has-checked:bg-white/25 has-disabled:border-gray-400 has-disabled:bg-gray-200 has-disabled:opacity-25 cursor-pointer transition hover:bg-white/15" 
            x-on:click="textMode = 'text-small'"
            x-bind:class="{'bg-white/25': textMode === 'text-small'}"    
        >
            <div class="flex-1">
                <span class="text-xs font-bold">A</span>
            </div>
        </button>

        <button class="relative group flex items-center justify-center text-center w-10 h-10 leading-1 shadow-sm bg-white/5 has-checked:bg-white/25 has-disabled:border-gray-400 has-disabled:bg-gray-200 has-disabled:opacity-25 cursor-pointer transition hover:bg-white/15" 
            x-on:click="textMode = 'text-medium'"
            x-bind:class="{'bg-white/25': textMode === 'text-medium'}"   
        >
            <div class="flex-1">
                <span class="text-sm font-bold">A</span>
            </div>
        </button>
        
        <button class="relative group flex items-center justify-center text-center w-10 h-10 leading-1 shadow-sm bg-white/5 has-checked:bg-white/25 has-disabled:border-gray-400 has-disabled:bg-gray-200 has-disabled:opacity-25 cursor-pointer transition hover:bg-white/15" 
            x-on:click="textMode = 'text-large'"
            x-bind:class="{'bg-white/25': textMode === 'text-large'}"    
        >
            <div class="flex-1">
                <span class="text-lg font-bold">A</span>
            </div>
        </button>
    </div>

    <div class="flex text-white items-center rounded-sm overflow-hidden">
        <button class="relative group flex items-center justify-center text-center w-10 h-10 leading-1 shadow-sm bg-white/5 has-checked:bg-white/25 has-disabled:border-gray-400 has-disabled:bg-gray-200 has-disabled:opacity-25 cursor-pointer transition hover:bg-white/15" 
            x-on:click="darkMode = 'mode-light'"
            x-bind:class="{'bg-white/25': darkMode !== 'mode-dark' || (darkMode !== 'system' && window.matchMedia('(prefers-color-scheme: light)').matches)}"    
        >
            <!-- Light -->
            <span class="text-sm font-bold text-[0px]">Light</span>

            <div class="absolute top-0 left-0 w-full h-full pointer-events-none flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"></path>
                </svg>
            </div>
        </button>

        <button class="relative group flex items-center justify-center text-center w-10 h-10 leading-1 shadow-sm bg-white/5 has-checked:bg-white/25 has-disabled:border-gray-400 has-disabled:bg-gray-200 has-disabled:opacity-25 cursor-pointer transition hover:bg-white/15" 
            x-on:click="darkMode = 'mode-dark'"
            x-bind:class="{'dark:bg-white/25': darkMode === 'mode-dark' || (darkMode === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)}"
        >
            <!-- Dark -->
            <span class="text-sm font-bold text-[0px]">Dark</span>
            
            <div class="absolute top-0 left-0 w-full h-full pointer-events-none flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z"></path>
                </svg>
            </div>
        </button>
    </div>
</div>   --}}