@props([
    'name' => null,
    'color' => 'accent',
    'textColor' => false,
])

@php
    $key = str_replace("'", "\\'", (string) $name);

    $activeTone = \Anzims\Satura\Support\Colors::tabBorder($color)
        .' '
        .($textColor ? \Anzims\Satura\Support\Colors::tabText($color) : 'text-ui-fg');
@endphp

<button
    type="button"
    role="tab"
    id="tab-{{ $name }}"
    :aria-selected="active === '{{ $key }}' ? 'true' : 'false'"
    :tabindex="active === '{{ $key }}' ? '0' : '-1'"
    x-on:click="active = '{{ $key }}'"
    class="-mb-px cursor-pointer border-b-2 bg-transparent px-3 py-2 text-ui-sm font-medium transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-ui-accent"
    :class="active === '{{ $key }}'
        ? '{{ $activeTone }}'
        : 'border-transparent text-ui-muted hover:text-ui-fg'"
>{{ $slot }}</button>