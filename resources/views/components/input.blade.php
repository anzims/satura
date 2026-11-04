@props([
    'type' => 'text',
    'size' => 'md',
    'color' => 'accent',
    'label' => null,
    'hint' => null,
    'error' => null,
    'invalid' => null,
])

@php
    $id = $attributes->get('id') ?? 'sat-'.Illuminate\Support\Str::random(10);
    $hasError = $error !== null || $invalid === true;

    $field = $hasError
        ? 'border-ui-danger focus:border-ui-danger focus:ring-ui-danger/30'
        : \Anzims\Satura\Support\Colors::field($color);
@endphp

<div class="grid gap-1.5">
    @if ($label)
        <x-sat::label :for="$id" :required="$attributes->has('required')">{{ $label }}</x-sat::label>
    @endif

    <input
        id="{{ $id }}"
        type="{{ $type }}"
        @if ($hasError) aria-invalid="true" @endif
        {{ $attributes->except('id')->class([
            'block w-full border bg-ui-surface text-ui-fg transition-colors',
            'focus:outline-none focus:ring-2',
            'placeholder:text-ui-muted',
            'disabled:cursor-not-allowed disabled:bg-ui-bg disabled:text-ui-muted',
            'readonly:bg-ui-bg readonly:text-ui-muted',
            $field,
            \Anzims\Satura\Support\Sizes::radiusFor($size),
            \Anzims\Satura\Support\Sizes::fieldFor($size),
        ]) }}
    >

    @if ($error)
        <x-sat::error :message="$error" />
    @elseif ($hint)
        <p class="text-ui-sm text-ui-muted">{{ $hint }}</p>
    @endif
</div>