@php
    use App\Mason\Enums\BackgroundColor;
    use App\Models\Term;
@endphp

@props([
    'background_color' => 'white',
])

<x-section
    @class([
        'font-body branded',
        match ($background_color) {
            BackgroundColor::Primary, 'primary' => 'bg-primary-500 text-white',
            BackgroundColor::Gray, 'gray' => 'bg-gray-100 text-gray-900',
            BackgroundColor::White, 'white' => 'bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-100',
            default => $background_color,
        },
    ])
>
    <div class="mx-auto w-full max-w-5xl px-6 py-8 lg:py-12">
        <x-prose>
            @if($data)
                @php $courseGroups = $courses->groupBy('course_type') ?? []; @endphp

                @if($courseGroups)
                    @foreach($courseGroups as $key => $courseGroup)
                        <x-section>
                            <h2>{{ $key }}</h2>
                            @foreach($courseGroup as $courseCard)
                                <x-filament::card>
                                    <h2>{{ $courseCard->title }}</h2>

                                    {{ $courseCard->excerpt }}
                                </x-filament::card>
                            @endforeach
                        </x-section>
                    @endforeach
                @else
                    <x-filament::section>
                        {{ __('There are currently no courses assigned to this term. Please check back later.') }}
                    </x-filament::section>
                @endif
            @else
                <x-filament::callout
                    icon="heroicon-o-information-circle"
                    color="info"
                >
                    <x-slot name="heading">
                        This preview will contain example cards.
                    </x-slot>

                    <x-slot name="description">
                        The content shown here won't exactly represent the courses you've added to this current term, but a faithful representation of them can be found below.
                    </x-slot>
                </x-filament::callout>

                <div class="flex gap-4 pt-4">
                    <x-filament::card class="flex-1">
                        <h2 class="text-lg font-bold">Example Course</h2>
                        <p>Example Course Teaser</p>
                    </x-filament::card>

                    <x-filament::card class="flex-1">
                        <h2 class="text-lg font-bold">Example Course</h2>
                        <p>Example Course Teaser</p>
                    </x-filament::card>
                </div>
            @endif
        </x-prose>
    </div>
</x-section>