@props([
    'width' => 'min-w-48',
    'button' => 'right',
])

@php
    $left = $button === 'left';
@endphp

<div
    x-data="{ open: false, x: 0, y: 0 }"
    @if ($left)
        x-on:click="open = true; x = $event.clientX; y = $event.clientY"
    @else
        x-on:contextmenu.prevent="open = true; x = $event.clientX; y = $event.clientY"
    @endif
    x-on:click.outside="open = false"
    x-on:keydown.escape.window="open = false"
    {{ $attributes }}
>
    {{ $slot }}

    <div
        x-show="open"
        x-cloak
        x-on:click.stop="open = false"
        :style="'top: ' + y + 'px; left: ' + x + 'px'"
        class="fixed z-50 overflow-hidden rounded-ui-md border border-ui-border bg-ui-surface py-1 shadow-lg {{ $width }}"
    >
        {{ $content ?? '' }}
    </div>
</div>