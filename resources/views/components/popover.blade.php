@props([])

<div
    x-data="{ open: false }"
    x-on:keydown.escape.window="open = false"
    x-on:click.outside="open = false"
    {{ $attributes->class(['relative inline-block']) }}
>
    {{ $slot }}
</div>