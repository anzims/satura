@props([
    'value' => 0,
    'max' => 100,
    'size' => 'md',
    'color' => 'accent',
    'variant' => 'line',
    'thickness' => null,
    'label' => null,
    'showValue' => false,
])

@php
    $max = (float) $max;
    $percent = $max > 0 ? max(0, min(100, ((float) $value / $max) * 100)) : 0;
    $circle = $variant === 'circle';
    $strokeWidth = $thickness ?? 4;
    $tight = in_array($size, ['3xs', '2xs', 'xs'], true);
    $suffix = $tight ? '' : '%';
@endphp

@if ($circle)
    <div
        role="progressbar"
        aria-valuenow="{{ $value }}"
        aria-valuemin="0"
        aria-valuemax="{{ $max }}"
        @if ($label) aria-label="{{ $label }}" @endif
        {{ $attributes->class(['relative inline-flex items-center justify-center', \Anzims\Satura\Support\Sizes::progressCircleFor($size)]) }}
    >
        <svg viewBox="0 0 36 36" fill="none" class="size-full -rotate-90">
            <circle
                cx="18"
                cy="18"
                r="16"
                pathLength="100"
                stroke-dasharray="100"
                stroke-width="{{ $strokeWidth }}"
                class="stroke-ui-border"
            />
            <circle
                cx="18"
                cy="18"
                r="16"
                pathLength="100"
                stroke-dasharray="100"
                stroke-dashoffset="{{ 100 - $percent }}"
                stroke-linecap="round"
                stroke-width="{{ $strokeWidth }}"
                class="{{ \Anzims\Satura\Support\Colors::stroke($color) }} transition-all"
            />
        </svg>

        @if ($showValue)
            <span class="absolute inset-0 flex items-center justify-center text-ui-fg {{ \Anzims\Satura\Support\Sizes::progressCircleTextFor($size) }}">
                {{ round($percent) }}{{ $suffix }}
            </span>
        @endif
    </div>
@else
    <div class="grid content-start gap-1">
        @if ($label || $showValue)
            <div class="flex items-center gap-2 text-ui-sm">
                @if ($label)
                    <span class="text-ui-fg">{{ $label }}</span>
                @endif
                @if ($showValue)
                    <span class="text-ui-muted">{{ round($percent) }}%</span>
                @endif
            </div>
        @endif

        <div
            role="progressbar"
            aria-valuenow="{{ $value }}"
            aria-valuemin="0"
            aria-valuemax="{{ $max }}"
            @if ($label) aria-label="{{ $label }}" @endif
            @if ($thickness) style="height: {{ $thickness }}" @endif
            {{ $attributes->class(array_filter([
                'w-full overflow-hidden rounded-full bg-ui-inset',
                $thickness === null ? \Anzims\Satura\Support\Sizes::progressFor($size) : null,
            ])) }}
        >
            <div
                class="h-full rounded-full transition-all {{ \Anzims\Satura\Support\Colors::solid($color) }}"
                style="width: {{ $percent }}%"
            ></div>
        </div>
    </div>
@endif