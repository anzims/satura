@props([
    'align' => 'start',
    'width' => 'w-48',
])

<div
    x-show="open"
    x-cloak
    x-transition.opacity.duration.100ms
    x-on:click="open = false"
    {{ $attributes->class([
        'absolute z-50 mt-1 overflow-hidden rounded-ui-md border border-ui-border bg-ui-surface py-1 shadow-lg',
        $align === 'end' ? 'end-0' : 'start-0',
        $width,
    ]) }}
>
    {{ $slot }}
</div>