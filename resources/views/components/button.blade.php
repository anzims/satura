@props([
    'variant' => 'solid',
    'size' => 'md',
    'color' => 'accent',
    'type' => 'button',
    'loading' => false,
])

@php
    $colors = \Anzims\Satura\Support\Colors::map();
    $palette = $colors[$color] ?? $colors['accent'];
    $tone = $palette[$variant] ?? $palette['solid'];
    $padding = $variant === 'link'
        ? 'px-0'
        : \Anzims\Satura\Support\Sizes::paddingFor($size);
@endphp

<button
    type="{{ $type }}"
    @if ($loading) aria-busy="true" @endif
    {{ $attributes
        ->class([
            'inline-flex items-center justify-center font-medium transition-colors',
            'focus-visible:outline-2 focus-visible:outline-offset-2',
            'disabled:pointer-events-none disabled:opacity-50',
            $tone,
            \Anzims\Satura\Support\Sizes::controlFor($size),
            \Anzims\Satura\Support\Sizes::radiusFor($size),
            $padding,
            'pointer-events-none opacity-70' => $loading,
        ])
        ->merge($loading ? ['disabled' => true] : []) }}
>
    @if ($loading)
        <x-sat::spinner :size="$size" />
    @endif

    {{ $slot }}
</button>