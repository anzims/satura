@props([
    'label' => null,
    'hint' => null,
    'error' => null,
    'for' => null,
    'required' => false,
])

<div {{ $attributes->class(['grid gap-1.5']) }}>
    @if ($label)
        <x-sat::label :for="$for" :required="$required">{{ $label }}</x-sat::label>
    @endif

    {{ $slot }}

    @if ($error)
        <x-sat::error :message="$error" />
    @elseif ($hint)
        <p class="text-ui-sm text-ui-muted">{{ $hint }}</p>
    @endif
</div>