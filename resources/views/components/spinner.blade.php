@props([
    'size' => 'md',
    'label' => null,
    'color' => null,
])

@php
    $tone = $color !== null ? \Anzims\Satura\Support\Colors::icon($color) : null;
@endphp

<span
    @if ($label) role="status" aria-label="{{ $label }}" @else aria-hidden="true" @endif
    {{ $attributes->class([
        'inline-block animate-spin rounded-full border-current border-t-transparent align-[-0.125em]',
        \Anzims\Satura\Support\Sizes::spinnerFor($size),
        $tone,
    ]) }}
></span>