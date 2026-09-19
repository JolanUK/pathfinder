@props([
    'background_color' => 'primary',
    'heading' => null,
    'subheading' => null,
])

<livewire:newsletter-signup :heading="$heading" :subheading="$subheading" :background-color="$background_color" />
