@props([
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

    <div class="group relative">
        <select
            id="{{ $id }}"
            @if ($hasError) aria-invalid="true" @endif
            {{ $attributes->except('id')->class([
                'block w-full appearance-none border bg-none bg-ui-surface text-ui-fg transition-colors',
                'focus:outline-none focus:ring-2',
                'disabled:cursor-not-allowed disabled:bg-ui-bg disabled:text-ui-muted',
                $field,
                \Anzims\Satura\Support\Sizes::radiusFor($size),
                \Anzims\Satura\Support\Sizes::fieldFor($size),
                \Anzims\Satura\Support\Sizes::selectPaddingFor($size),
            ]) }}
        >
            {{ $slot }}
        </select>

        <x-sat::icon
            name="chevron-down"
            :size="$size"
            class="pointer-events-none absolute inset-y-0 my-auto text-ui-muted transition-opacity group-focus-within:opacity-40 {{ \Anzims\Satura\Support\Sizes::selectIconFor($size) }}"
        />
    </div>

    @if ($error)
        <x-sat::error :message="$error" />
    @elseif ($hint)
        <p class="text-ui-sm text-ui-muted">{{ $hint }}</p>
    @endif
</div>