@php
    use App\Mason\Enums\BackgroundColor;
@endphp

@props([
    'background_color' => null,
    'layout' => null,
    'image' => null,
])

<section
    @class([
        'font-body branded',
        match ($background_color) {
            BackgroundColor::LayoutPrimary, 'layoutPrimary' => 'bg-primary-500 text-white',
            BackgroundColor::LayoutSecondary, 'layoutSecondary' => 'bg-gray-100 text-gray-900',
            BackgroundColor::Primary, 'primary' => 'bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-100',
            default => $background_color,
        },
    ])
>
    <div 
        @class([
            'mx-auto w-full max-w-content px-6 py-8 lg:py-12',
            match ($layout) {
                'cover' => '',
                'columns' => 'flex flex-col sm:flex-row gap-4 sm:gap-6',
                'stacked' => 'flex flex-col',
                default => $background_color,
            },
        ])
    >
        @if (filled($image))
            <div
                @class([
                    'not-prose',
                    match ($layout) {
                        'cover' => '',
                        'columns' => 'sm:flex-1',
                        'stacked' => 'flex flex-col',
                        default => $background_color,
                    },
                ])
            >
                <img
                    src="{{ asset(\Illuminate\Support\Facades\Storage::url($image)) }}"
                    alt="{!! $heading !!}"
                />
            </div>
        @endif

        @if ($heading)
            <div
                @class([
                    'prose',
                    match ($layout) {
                        'cover' => '',
                        'columns' => 'sm:flex-1',
                        'stacked' => 'flex flex-col',
                        default => $background_color,
                    },
                ])
            >
                <x-prose>
                    {!! $heading !!}
                </x-prose>
            </div>
        @endif

        {{-- @if ($description)
            <x-prose>
                {!! $description !!}
            </x-prose>
        @endif --}}
    </div>
</section>