@props([
    'items' => [],
    'current' => 1,
    'size' => 'md',
    'color' => 'accent',
])

@php
    $current = max(1, (int) $current);

    $sizes = [
        'sm' => ['circle' => 'size-6', 'text' => 'text-ui-2xs', 'label' => 'text-ui-xs'],
        'md' => ['circle' => 'size-8', 'text' => 'text-ui-xs', 'label' => 'text-ui-sm'],
        'lg' => ['circle' => 'size-10', 'text' => 'text-ui-sm', 'label' => 'text-base'],
    ];

    $s = $sizes[$size] ?? $sizes['md'];
@endphp

<ol {{ $attributes->class(['flex flex-wrap items-center gap-2']) }}>
    @foreach ($items as $index => $item)
        @php
            $number = $index + 1;
            $label = is_array($item) ? ($item['label'] ?? '') : $item;
            $description = is_array($item) ? ($item['description'] ?? null) : null;
            $state = $number < $current ? 'done' : ($number === $current ? 'current' : 'upcoming');

            $stepColor = is_array($item) && ! empty($item['color']) ? $item['color'] : $color;
            $doneTone = \Anzims\Satura\Support\Colors::stepDone($stepColor);
            $currentTone = \Anzims\Satura\Support\Colors::stepCurrent($stepColor);
        @endphp

        <li class="flex items-center gap-2">
            <span
                @class([
                    'inline-flex shrink-0 items-center justify-center rounded-full font-medium',
                    $s['circle'],
                    $s['text'],
                    $doneTone => $state === 'done',
                    'border-2' => $state === 'current',
                    $currentTone => $state === 'current',
                    'border border-ui-border text-ui-muted' => $state === 'upcoming',
                ])
                @if ($state === 'current') aria-current="step" @endif
            >
                @if ($state === 'done')
                    <x-sat::icon name="check" size="2xs" />
                @else
                    {{ $number }}
                @endif
            </span>

            <span class="grid">
                <span @class([
                    $s['label'],
                    'text-ui-fg' => $state !== 'upcoming',
                    'text-ui-muted' => $state === 'upcoming',
                ])>{{ $label }}</span>

                @if ($description)
                    <span class="text-ui-xs text-ui-muted">{{ $description }}</span>
                @endif
            </span>
        </li>

        @unless ($loop->last)
            <li aria-hidden="true" class="h-px min-w-6 flex-1 bg-ui-border-strong"></li>
        @endunless
    @endforeach
</ol>