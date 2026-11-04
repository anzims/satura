@props([
    'label' => null,
])

<div class="px-3 py-1 text-ui-2xs font-medium uppercase tracking-wide text-ui-muted" {{ $attributes }}>
    {{ $label ?? $slot }}
</div>