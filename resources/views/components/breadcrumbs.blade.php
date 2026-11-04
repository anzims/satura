@props([
    'items' => [],
    'collapse' => null,
    'separator' => null,
    'gap' => 'sm',
    'size' => 'md',
])

@php
    $list = is_array($items) ? $items : [];

    if ($collapse !== null && count($list) > $collapse + 2) {
        $list = array_merge(
            array_slice($list, 0, 1),
            [null],
            array_slice($list, -$collapse),
        );
    }

    $sizes = [
        'xs' => 'text-ui-2xs',
        'sm' => 'text-ui-xs',
        'md' => 'text-ui-sm',
        'lg' => 'text-base',
    ];

    $gaps = [
        'none' => 'gap-0',
        'xs' => 'gap-0.5',
        'sm' => 'gap-1.5',
        'md' => 'gap-2.5',
    ];

    $iconSizes = [
        'xs' => '3xs',
        'sm' => '3xs',
        'md' => '2xs',
        'lg' => 'xs',
    ];

    $text = $sizes[$size] ?? $sizes['md'];
    $space = $gaps[$gap] ?? $gaps['sm'];
    $icon = $iconSizes[$size] ?? $iconSizes['md'];
@endphp

<nav aria-label="Хлебные крошки" {{ $attributes->class([$text]) }}>
    @if ($list === [])
        {{ $slot }}
    @else
        <ol class="flex flex-wrap items-center {{ $space }}">
            @foreach ($list as $item)
                @if ($item === null)
                    <li aria-hidden="true" class="px-1 text-ui-muted">…</li>
                @else
                    <li class="flex items-center {{ $space }}">
                        @if (! $loop->last && ! empty($item['url']))
                            <a href="{{ $item['url'] }}" class="text-ui-muted transition-colors hover:text-ui-fg">{{ $item['label'] }}</a>
                        @elseif ($loop->last)
                            <span aria-current="page" class="font-medium text-ui-fg">{{ $item['label'] }}</span>
                        @else
                            <span class="text-ui-muted">{{ $item['label'] }}</span>
                        @endif

                        @unless ($loop->last)
                            @if ($separator !== null)
                                <span aria-hidden="true" class="text-ui-muted">{{ $separator }}</span>
                            @else
                                <x-sat::icon name="chevron-down" :size="$icon" class="shrink-0 -rotate-90 text-ui-muted" />
                            @endif
                        @endunless
                    </li>
                @endif
            @endforeach
        </ol>
    @endif
</nav>