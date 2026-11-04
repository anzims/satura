@props([
    'color' => 'accent',
    'variant' => 'tint',
    'size' => 'xs',
])

@php
    $colors = \Anzims\Satura\Support\Colors::map();
    $palette = $colors[$color] ?? $colors['accent'];
    $tone = $palette[$variant] ?? $palette['tint'];
    $borderless = in_array($variant, ['solid', 'soft', 'ghost'], true);
@endphp

<span {{ $attributes->class(array_filter([
    'inline-flex items-center border font-medium',
    $borderless ? 'border-transparent' : null,
    $tone,
    \Anzims\Satura\Support\Sizes::radiusFor($size),
    \Anzims\Satura\Support\Sizes::badgeFor($size),
])) }}>
    {{ $slot }}
</span>