@props([])

<div x-on:click="open = true" {{ $attributes->class(['contents']) }}>
    {{ $slot }}
</div>