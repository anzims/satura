@props([
    'shape' => 'block',
    'color' => null,
])

@php
    $shapes = [
        'block' => 'h-10 rounded-ui-md',
        'text' => 'h-3 rounded',
        'circle' => 'rounded-full',
    ];

    $tone = $color !== null
        ? \Anzims\Satura\Support\Colors::skeleton($color)
        : 'bg-ui-skeleton';
@endphp

<div
    aria-hidden="true"
    {{ $attributes->class([
        'animate-pulse',
        $tone,
        $shapes[$shape] ?? $shapes['block'],
    ]) }}
></div>