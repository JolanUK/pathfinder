<?php

use Livewire\Component;

new class extends Component
{

};
?>

<div>
    <div class="fi-pre-header py-4 lg:flex bg-white uppercase relative z-5">
        <div class="w-full px-6 lg:px-8">
            <div class="w-full mx-auto flex items-center flex-nowrap md:flex-wrap gap-6 md:gap-6 md:justify-between">
                <nav class="flex gap-12 md:gap-12 flex-wrap md:flex-nowrap">
                    I'm not entirely sure what to put here
                </nav>

                <nav class="hidden lg:flex gap-6 lg:justify-end">
                    <div>
                        <div 
                            x-data="{ text: Text.get() }"
                            class="flex items-center rounded-sm overflow-hidden"
                        >
                            <button class="relative group flex items-center justify-center text-center w-10 h-10 leading-1 shadow-sm bg-white/10 has-checked:bg-white/25 has-disabled:border-gray-400 has-disabled:bg-gray-200 has-disabled:opacity-25 cursor-pointer transition hover:bg-white/15" 
                                @click="text = text === 'small' ? 'medium' : 'small'; Text.set(text);"
                                x-bind:class="{'bg-white/25': text === 'small'}"
                            >
                                <div class="flex-1">
                                    <span class="text-sm font-bold">A</span>
                                </div>
                            </button>

                            <button class="relative group flex items-center justify-center text-center w-10 h-10 leading-1 shadow-sm bg-white/10 has-checked:bg-white/25 has-disabled:border-gray-400 has-disabled:bg-gray-200 has-disabled:opacity-25 cursor-pointer transition hover:bg-white/15" 
                                @click="text = text === 'medium' ? 'medium' : 'medium'; Text.set(text);"
                                x-bind:class="{'bg-white/25': text === 'medium'}"
                            >
                                <div class="flex-1">
                                    <span class="text-lg font-bold">A</span>
                                </div>
                            </button>

                            <button class="relative group flex items-center justify-center text-center w-10 h-10 leading-1 shadow-sm bg-white/10 has-checked:bg-white/25 has-disabled:border-gray-400 has-disabled:bg-gray-200 has-disabled:opacity-25 cursor-pointer transition hover:bg-white/15" 
                                @click="text = text === 'large' ? 'medium' : 'large'; Text.set(text);"
                                x-bind:class="{'bg-white/25': text === 'large'}"
                            >
                                <div class="flex-1">
                                    <span class="text-xl font-bold">A</span>
                                </div>
                            </button>
                        </div>
                    </div>

                    <div>
                        <div 
                            x-data="{ theme: Theme.get() }"
                            class="flex items-center rounded-sm overflow-hidden"
                        >
                            <button class="relative group flex items-center justify-center text-center w-10 h-10 leading-1 shadow-sm bg-white/10 has-checked:bg-white/25 has-disabled:border-gray-400 has-disabled:bg-gray-200 has-disabled:opacity-25 cursor-pointer transition hover:bg-white/15" 
                                @click="theme = theme === 'light' ? 'light' : 'light'; Theme.set(theme);"
                                x-bind:class="{'bg-white/25': theme === 'light'}"
                            >
                                <x-heroicon-o-sun class="w-5 h-5" />
                            </button>

                            <button class="relative group flex items-center justify-center text-center w-10 h-10 leading-1 shadow-sm bg-white/10 has-checked:bg-white/25 has-disabled:border-gray-400 has-disabled:bg-gray-200 has-disabled:opacity-25 cursor-pointer transition hover:bg-white/15" 
                                @click="theme = theme === 'dark' ? 'light' : 'dark'; Theme.set(theme);"
                                x-bind:class="{'bg-white/25': theme === 'dark'}"
                            >
                                <x-heroicon-o-moon class="w-5 h-5" />
                            </button>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>