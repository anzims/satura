@props([
    'href' => null,
    'description' => null,
    'color' => null,
])

@php
    $classes = array_filter([
        'flex w-full items-start gap-2 px-3 py-1.5 text-left text-ui-sm transition-colors hover:bg-ui-bg',
        $color === null ? 'text-ui-fg' : \Anzims\Satura\Support\Colors::itemText($color),
    ]);
@endphp

@if ($href)
    <a href="{{ $href }}" role="menuitem" {{ $attributes->class($classes) }}>
        <span class="grid gap-0.5">
            <span>{{ $slot }}</span>
            @if ($description)
                <span class="text-ui-xs text-ui-muted">{{ $description }}</span>
            @endif
        </span>
    </a>
@else
    <button type="button" role="menuitem" {{ $attributes->class($classes) }}>
        <span class="grid gap-0.5">
            <span>{{ $slot }}</span>
            @if ($description)
                <span class="text-ui-xs text-ui-muted">{{ $description }}</span>
            @endif
        </span>
    </button>
@endif