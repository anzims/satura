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
        type="radio"
        {{ $attributes->except('id')->class(['peer sr-only']) }}
    >

    <span
        aria-hidden="true"
        class="flex shrink-0 items-center justify-center rounded-full border border-ui-border bg-ui-surface transition-colors peer-checked:border-transparent peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-ui-accent peer-disabled:opacity-50 [&>span]:size-1/2 [&>span]:rounded-full [&>span]:bg-white [&>span]:opacity-0 [&>span]:peer-checked:opacity-100 {{ \Anzims\Satura\Support\Sizes::checkboxFor($size) }} {{ \Anzims\Satura\Support\Colors::toggle($color) }}"
    >
        <span></span>
    </span>

    @if ($label || $slot->isNotEmpty())
        <span class="text-ui-sm text-ui-fg">{{ $label ?? $slot }}</span>
    @endif
</label>