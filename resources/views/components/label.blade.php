@props([
    'for' => null,
    'required' => false,
])

<label
    @if ($for) for="{{ $for }}" @endif
    {{ $attributes->class(['block text-ui-sm font-medium text-ui-fg']) }}
>
    {{ $slot }}@if ($required)<span class="ms-0.5 text-ui-danger" aria-hidden="true">*</span>@endif
</label>