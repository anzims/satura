@props([
    'href' => null,
    'icon' => null,
    'description' => null,
    'color' => null,
    'checked' => null,
])

@php
    $classes = array_filter([
        'flex w-full items-center gap-2 px-3 py-1.5 text-left text-ui-sm transition-colors hover:bg-ui-bg',
        $color !== null ? \Anzims\Satura\Support\Colors::itemText($color) : 'text-ui-fg',
    ]);
@endphp

@if ($href)
    <a href="{{ $href }}" role="menuitem" {{ $attributes->class($classes) }}>
@else
    <button type="button" role="menuitem" {{ $attributes->class($classes) }}>
@endif
        @if ($icon)
            <x-sat::icon :name="$icon" size="sm" class="shrink-0 text-ui-muted" />
        @endif

        <span class="grid min-w-0 flex-1 gap-0.5">
            <span>{{ $slot }}</span>
            @if ($description)
                <span class="text-ui-xs text-ui-muted">{{ $description }}</span>
            @endif
        </span>

        @if ($checked)
            <x-sat::icon name="check" size="sm" class="shrink-0 text-ui-accent" />
        @endif

@if ($href)
    </a>
@else
    </button>
@endif