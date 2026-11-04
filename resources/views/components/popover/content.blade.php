@props([
    'placement' => 'bottom-start',
    'width' => 'w-72',
])

@php
    $placements = [
        'bottom-start' => 'top-full start-0 mt-1',
        'bottom-end' => 'top-full end-0 mt-1',
        'top-start' => 'bottom-full start-0 mb-1',
        'top-end' => 'bottom-full end-0 mb-1',
    ];

    $position = $placements[$placement] ?? $placements['bottom-start'];
@endphp

<div
    x-show="open"
    x-cloak
    x-transition.opacity.duration.100ms
    {{ $attributes->class([
        'absolute z-50 rounded-ui-md border border-ui-border bg-ui-surface p-3 text-ui-sm text-ui-fg shadow-lg',
        $position,
        $width,
    ]) }}
>
    {{ $slot }}
</div>