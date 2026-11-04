@props([
    'size' => 'md',
    'color' => 'accent',
    'offColor' => null,
    'label' => null,
    'onLabel' => null,
    'offLabel' => null,
    'checked' => false,
    'target' => null,
    'loading' => false,
    'variant' => 'pill',
])

@php
    $id = $attributes->get('id') ?? 'sat-'.Illuminate\Support\Str::random(10);
    $slider = $variant === 'slider';

    $track = $slider
        ? \Anzims\Satura\Support\Sizes::sliderTrackFor($size)
        : \Anzims\Satura\Support\Sizes::toggleTrackFor($size);

    $thumb = $slider
        ? \Anzims\Satura\Support\Sizes::sliderThumbFor($size)
        : \Anzims\Satura\Support\Sizes::toggleThumbFor($size);

    $shift = $slider
        ? \Anzims\Satura\Support\Sizes::sliderShiftFor($size)
        : \Anzims\Satura\Support\Sizes::toggleShiftFor($size);

    $offColour = $offColor !== null
        ? \Anzims\Satura\Support\Colors::toggleOff($offColor)
        : 'bg-ui-switch-off';

    $pair = $onLabel !== null || $offLabel !== null;
    $offText = $offLabel ?? 'Выкл';
    $onText = $onLabel ?? 'Вкл';
@endphp

<div class="relative inline-flex items-center gap-2">
    <input
        id="{{ $id }}"
        type="checkbox"
        role="switch"
        @if ($checked) checked @endif
        {{ $attributes->except('id')->class(['peer sr-only']) }}
    >

    @if ($slider && $pair)
        <label for="{{ $id }}" class="cursor-pointer text-ui-sm text-ui-fg transition-colors peer-checked:text-ui-muted">{{ $offText }}</label>
    @endif

    <label
        for="{{ $id }}"
        aria-hidden="true"
        class="relative inline-flex shrink-0 cursor-pointer items-center justify-center rounded-full {{ $offColour }} transition-colors after:absolute after:start-0.5 after:top-0.5 after:rounded-full after:bg-white after:shadow-sm after:transition-transform after:content-[''] peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-ui-accent peer-disabled:cursor-not-allowed peer-disabled:opacity-50 {{ $track }} {{ \Anzims\Satura\Support\Colors::toggle($color) }} {{ $thumb }} {{ $shift }}"
    >
        @if ($target || $loading)
            <span
                @if ($target) wire:loading.flex wire:target="{{ $target }}" @endif
                class="absolute inset-0 z-10 {{ $target ? 'hidden' : 'flex' }} items-center justify-center rounded-full bg-ui-bg/60"
            >
                <x-sat::spinner :size="$size" class="text-ui-muted" />
            </span>
        @endif
    </label>

    @if ($slider && $pair)
        <label for="{{ $id }}" class="cursor-pointer text-ui-sm text-ui-muted transition-colors peer-checked:text-ui-fg">{{ $onText }}</label>
    @elseif ($pair)
        <span class="text-ui-sm text-ui-fg peer-checked:hidden">{{ $offText }}</span>
        <span class="hidden text-ui-sm text-ui-fg peer-checked:inline">{{ $onText }}</span>
    @elseif ($label || $slot->isNotEmpty())
        <label for="{{ $id }}" class="cursor-pointer text-ui-sm text-ui-fg">{{ $label ?? $slot }}</label>
    @endif
</div>