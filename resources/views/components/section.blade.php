@php
    use App\Mason\Enums\BackgroundColor;
@endphp

@props([
    'bgColor' => 'white',
])

<div
    @class([
        'branded @container',
        match ($bgColor) {
            BackgroundColor::Primary, 'primary' => 'bg-primary-500 text-white',
            BackgroundColor::Gray, 'gray' => 'bg-gray-100 text-gray-900',
            BackgroundColor::White, 'white' => 'bg-white text-gray-900',
            default => $bgColor,
        },
    ])
>
    {{ $slot }}
</div>
