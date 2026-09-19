@php
    use App\Mason\Enums\BackgroundColor;
@endphp

@props([
    'background_color' => 'white',
    'image_position' => null,
    'image_alignment' => null,
    'image_rounded' => false,
    'image_shadow' => false,
    'text' => null,
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
    <div class="mx-auto w-full max-w-5xl px-6 py-8 lg:py-12">
        <div
            @class([
                'grid gap-6 md:grid-cols-3',
                'items-center' => $image_alignment === 'middle',
                'items-end' => $image_alignment === 'bottom',
                'items-start' => $image_alignment === 'top',
            ])
        >
            @if (filled($image))
                <div
                    @class([
                        'not-prose',
                        'order-0' => $image_position === 'start',
                        'order-1' => $image_position === 'end',
                        'items-end' => $image_alignment === 'bottom',
                        'items-start' => $image_alignment === 'top',
                    ])
                >
                    <img
                        src="{{ asset(\Illuminate\Support\Facades\Storage::url($image)) }}"
                        alt=""
                        @class([
                            'rounded-lg' => $image_rounded,
                            'shadow-md' => $image_shadow,
                        ])
                    />
                </div>
            @endif

            <div
                @class([
                    'md:col-span-2' => filled($image),
                    'md:col-span-3' => ! filled($image),
                ])
            >
                @if ($text)
                    <x-prose>
                        {!! $text !!}
                    </x-prose>
                @endif
            </div>
        </div>
    </div>
</section>
