@props([])

<div
    x-on:click="open = !open"
    :aria-expanded="open ? 'true' : 'false'"
    {{ $attributes->class(['inline-flex cursor-pointer items-center leading-none']) }}
>
    {{ $slot }}
</div>