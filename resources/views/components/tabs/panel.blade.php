@props([
    'name' => null,
])

@php
    $key = str_replace("'", "\\'", (string) $name);
@endphp

<div
    role="tabpanel"
    id="panel-{{ $name }}"
    aria-labelledby="tab-{{ $name }}"
    x-show="active === '{{ $key }}'"
    x-cloak
    {{ $attributes->class(['text-ui-sm text-ui-fg']) }}
>
    {{ $slot }}
</div>