<div class="w-full mt-2">
    <div class="flex flex-col lg:flex-row divide lg:divide-none divide-y divide-gray-200 dark:divide-gray-800 lg:gap-6">

        <div class="flex flex-row py-2 gap-2">
            <h3 class="text-md font-normal">{{ __('Courses') }}</h3>

            @if($record->courses)
                <x-filament::icon-button
                    color="success"
                    icon="heroicon-o-check"
                />
            @else
                <x-filament::icon-button
                    color="danger"
                    icon="heroicon-o-x-mark"
                />
            @endif
        </div>

        <div class="flex flex-row py-2 gap-2">
            <h3 class="text-md font-normal">{{ __('Content') }}</h3>

            @if($record->content)
                <x-filament::icon-button
                    color="success"
                    icon="heroicon-o-check"
                />
            @else
                <x-filament::icon-button
                    color="danger"
                    icon="heroicon-o-x-mark"
                />
            @endif
        </div>

        <div class="flex flex-row py-2 gap-2">
            <h3 class="text-md font-normal">{{ __('Prospectus') }}</h3>

            @if($record->prospectus)
                <x-filament::icon-button
                    color="success"
                    icon="heroicon-o-check"
                />
            @else
                <x-filament::icon-button
                    color="danger"
                    icon="heroicon-o-x-mark"
                />
            @endif
        </div>

    </div>
</div>