@props([
    'default' => null,
])

@php
    $key = str_replace("'", "\\'", (string) $default);
@endphp

<div x-data="{ active: '{{ $key }}' }" {{ $attributes->class(['grid']) }}>
    <div role="tablist" class="flex flex-wrap items-center gap-1 border-b border-ui-border">
        {{ $triggers ?? '' }}
    </div>

    <div class="pt-3">
        {{ $slot }}
    </div>
</div>