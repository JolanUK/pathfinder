@php
use App\Mason\Enums\ColumnWidth;
use Filament\Forms\Components\RichEditor\RichContentRenderer;

// Asymmetric column mappings: [first_column_class, second_column_class]
$asymmetricTablet = [
    ColumnWidth::AsymmetricLeftThirds->value => ['md:col-span-4', 'md:col-span-8'],
    ColumnWidth::AsymmetricRightThirds->value => ['md:col-span-8', 'md:col-span-4'],
    ColumnWidth::AsymmetricLeftFourths->value => ['md:col-span-3', 'md:col-span-9'],
    ColumnWidth::AsymmetricRightFourths->value => ['md:col-span-9', 'md:col-span-3'],
];

$asymmetricDesktop = [
    ColumnWidth::AsymmetricLeftThirds->value => ['lg:col-span-4', 'lg:col-span-8'],
    ColumnWidth::AsymmetricRightThirds->value => ['lg:col-span-8', 'lg:col-span-4'],
    ColumnWidth::AsymmetricLeftFourths->value => ['lg:col-span-3', 'lg:col-span-9'],
    ColumnWidth::AsymmetricRightFourths->value => ['lg:col-span-9', 'lg:col-span-3'],
];

// Regular column mappings: [base_class, breakpoint_class]
$tabletSpans = [
    ColumnWidth::Two->value => ['col-span-12', 'md:col-span-6'],
    ColumnWidth::FixedTwo->value => ['col-span-6', null],
    ColumnWidth::Three->value => ['col-span-12', 'md:col-span-4'],
    ColumnWidth::FixedThree->value => ['col-span-4', null],
    ColumnWidth::Four->value => ['col-span-12', 'md:col-span-3'],
    ColumnWidth::FixedFour->value => ['col-span-3', null],
];

$desktopSpans = [
    ColumnWidth::Two->value => 'lg:col-span-6',
    ColumnWidth::Three->value => 'lg:col-span-4',
    ColumnWidth::Four->value => 'lg:col-span-3',
];
@endphp

@props([
    'id' => null,
    'background_color' => 'white',
    'columns_tablet' => ColumnWidth::Two->value,
    'columns_desktop' => ColumnWidth::Two->value,
    'alignment' => 'top',
    'columns' => []
])

<x-section :bg-color="$background_color">
    <div
        @class([
            'mx-auto w-full max-w-5xl px-6 py-8 lg:py-12 grid gap-6 grid-cols-12',
            match($alignment) {
                'middle' => 'items-center',
                'bottom' => 'items-end',
                default => 'items-start',
            }
        ])
    >
        @foreach ($columns as $col)
            @php
                $classes = [];
                $idx = $loop->index === 0 ? 0 : 1;

                // Asymmetric columns
                if (isset($asymmetricTablet[$columns_tablet])) {
                    $classes[] = $asymmetricTablet[$columns_tablet][$idx];
                }
                if (isset($asymmetricDesktop[$columns_desktop])) {
                    $classes[] = $asymmetricDesktop[$columns_desktop][$idx];
                }

                // Regular tablet columns
                if (isset($tabletSpans[$columns_tablet])) {
                    [$base, $breakpoint] = $tabletSpans[$columns_tablet];
                    $classes[] = $base;
                    if ($breakpoint) {
                        $classes[] = $breakpoint;
                    }
                } else {
                    $classes[] = 'col-span-12';
                }

                // Regular desktop columns
                if (isset($desktopSpans[$columns_desktop])) {
                    $classes[] = $desktopSpans[$columns_desktop];
                }

                // Visibility
                $classes[] = match(true) {
                    !in_array('mobile', $col['visibility']) => 'hidden md:block',
                    !in_array('tablet', $col['visibility']) => 'block md:hidden lg:block',
                    !in_array('desktop', $col['visibility']) => 'block lg:hidden',
                    default => '',
                };
            @endphp

            <div @class($classes)>
                @if ($col['text'])
                    <x-prose>
                        {!! RichContentRenderer::make($col['text'])->toUnsafeHtml() !!}
                    </x-prose>
                @endif
            </div>
        @endforeach
    </div>
</x-section>
