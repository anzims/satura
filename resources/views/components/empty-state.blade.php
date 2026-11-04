@props([
    'title' => null,
    'description' => null,
    'icon' => 'search',
    'color' => 'neutral',
    'size' => 'xl',
    'compact' => false,
])

<div {{ $attributes->class(['grid content-center justify-items-center gap-3 text-center', $compact ? 'py-6' : 'py-10']) }}>
    <x-sat::icon :name="$icon" circle :color="$color" :size="$size" />

    @if ($title)
        <p class="text-base font-medium text-ui-fg">{{ $title }}</p>
    @endif

    @if ($description)
        <p class="max-w-sm text-ui-sm text-ui-muted">{{ $description }}</p>
    @endif

    {{ $slot }}

    @isset($actions)
        <div class="flex flex-wrap items-center justify-center gap-2 pt-1">
            {{ $actions }}
        </div>
    @endisset
</div>