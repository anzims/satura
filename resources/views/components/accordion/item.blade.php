@props([
    'title' => null,
    'open' => false,
    'name' => null,
])

@php
    $customHeader = isset($header);
    $headerActions = $headerActions ?? null;
@endphp

<details
    @if ($open) open @endif
    @if ($name) name="{{ $name }}" @endif
    {{ $attributes->class(['group']) }}
>
    <summary class="flex cursor-pointer list-none items-center justify-between gap-3 px-4 py-3 text-ui-sm font-medium text-ui-fg transition-colors hover:bg-ui-bg focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-ui-accent [&::-webkit-details-marker]:hidden">
        <span class="min-w-0 flex-1">
            @if ($customHeader)
                {{ $header }}
            @else
                {{ $title }}
            @endif
        </span>

        @if ($headerActions !== null)
            <span class="flex shrink-0 items-center gap-2" onclick="event.stopPropagation()">
                {{ $headerActions }}
            </span>
        @endif

        <x-sat::icon name="chevron-down" size="sm" class="shrink-0 text-ui-muted transition-transform group-open:rotate-180" />
    </summary>

    <div class="px-4 pb-3 text-ui-sm text-ui-muted">
        {{ $slot }}
    </div>
</details>