@props([
    'size' => 'md',
    'color' => 'accent',
    'label' => null,
])

@php
    $id = $attributes->get('id') ?? 'sat-'.Illuminate\Support\Str::random(10);
@endphp

<label class="inline-flex cursor-pointer items-center gap-2">
    <input
        id="{{ $id }}"
        type="checkbox"
        {{ $attributes->except('id')->class(['peer sr-only']) }}
    >

    <span
        aria-hidden="true"
        class="flex shrink-0 items-center justify-center rounded border border-ui-border bg-ui-surface text-white transition-colors peer-checked:border-transparent peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-ui-accent peer-disabled:opacity-50 [&>svg]:size-[70%] [&>svg]:opacity-0 [&>svg]:peer-checked:opacity-100 {{ \Anzims\Satura\Support\Sizes::checkboxFor($size) }} {{ \Anzims\Satura\Support\Colors::toggle($color) }}"
    >
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.5l5 5 10-11" />
        </svg>
    </span>

    @if ($label || $slot->isNotEmpty())
        <span class="text-ui-sm text-ui-fg">{{ $label ?? $slot }}</span>
    @endif
</label>