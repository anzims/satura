@props([
    'color' => 'accent',
    'variant' => 'tint',
    'title' => null,
    'icon' => null,
    'role' => 'status',
])

@php
    $colors = \Anzims\Satura\Support\Colors::map();
    $palette = $colors[$color] ?? $colors['accent'];
    $tone = $palette[$variant] ?? $palette['tint'];

    $defaults = [
        'accent' => 'info',
        'blue' => 'info',
        'sky' => 'info',
        'red' => 'alert',
        'rose' => 'alert',
        'amber' => 'alert',
        'yellow' => 'alert',
        'green' => 'check',
        'emerald' => 'check',
        'lime' => 'check',
    ];

    $iconName = $icon ?? ($defaults[$color] ?? 'info');
    $borderless = $variant === 'solid';
@endphp

<div
    role="{{ $role }}"
    {{ $attributes->class(array_filter([
        'flex items-start gap-3 rounded-ui-md border px-3 py-2.5 text-ui-sm',
        $borderless ? 'border-transparent' : null,
        $tone,
    ])) }}
>
    <x-sat::icon :name="$iconName" size="sm" class="mt-0.5 shrink-0" />

    <div class="grid gap-1">
        @if ($title)
            <p class="font-medium">{{ $title }}</p>
        @endif

        <div>{{ $slot }}</div>

        @isset($actions)
            <div class="flex flex-wrap items-center gap-2 pt-1">
                {{ $actions }}
            </div>
        @endisset
    </div>
</div>