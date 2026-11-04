@props([
    'variant' => 'ghost',
    'size' => 'md',
    'color' => 'accent',
    'type' => 'button',
    'label' => null,
    'icon' => null,
    'shape' => 'square',
    'title' => null,
])

@php
    $colors = \Anzims\Satura\Support\Colors::map();
    $palette = $colors[$color] ?? $colors['accent'];
    $tone = $palette[$variant] ?? $palette['ghost'];
    $radius = $shape === 'circle' ? 'rounded-full' : \Anzims\Satura\Support\Sizes::radiusFor($size);
@endphp

<button
    type="{{ $type }}"
    @if ($label) aria-label="{{ $label }}" @endif
    @if ($title) title="{{ $title }}" @endif
    {{ $attributes->class([
        'inline-flex items-center justify-center',
        'focus-visible:outline-2 focus-visible:outline-offset-2',
        'disabled:pointer-events-none disabled:opacity-50',
        $tone,
        \Anzims\Satura\Support\Sizes::squareFor($size),
        $radius,
    ]) }}
>
    @if ($icon)
        <x-sat::icon :name="$icon" :size="$size" />
    @else
        {{ $slot }}
    @endif
</button>