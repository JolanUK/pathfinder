<x-filament-widgets::widget>
    <div class="grid grid-cols-3 gap-6">
        @foreach($roles as $capability)
            <div class="col-span-1 grid grid-cols-1 self-stretch">
                <x-filament::section class="theme-tertiary">
                    <x-slot name="heading">
                        {{ 'At a glance: ' . $capability }}
                    </x-slot>

                    @livewire('filament::partials.role-navigation.' . $capability)
                </x-filament::section>
            </div>
        @endforeach
    </div>
</x-filament-widgets::widget>