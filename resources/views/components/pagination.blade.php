@props([
    'current' => 1,
    'last' => 1,
    'url' => null,
    'size' => 'md',
    'variant' => 'plain',
])

@php
    $current = max(1, (int) $current);
    $last = max(1, (int) $last);

    $pages = [1];

    if ($current > 3) {
        $pages[] = null;
    }

    for ($page = max(2, $current - 1); $page <= min($last - 1, $current + 1); $page++) {
        $pages[] = $page;
    }

    if ($current < $last - 2) {
        $pages[] = null;
    }

    if ($last > 1) {
        $pages[] = $last;
    }

    $link = function (int $page) use ($url): string {
        if ($url instanceof \Closure) {
            return (string) $url($page);
        }

        if (is_string($url) && $url !== '') {
            return str_replace('{page}', (string) $page, $url);
        }

        return request()->fullUrlWithQuery(['page' => $page]);
    };

    $sizes = [
        'xs' => ['h' => 'h-6', 'px' => 'px-1.5', 'w' => 'w-6', 'text' => 'text-ui-2xs'],
        'sm' => ['h' => 'h-7', 'px' => 'px-2', 'w' => 'w-7', 'text' => 'text-ui-xs'],
        'md' => ['h' => 'h-8', 'px' => 'px-2', 'w' => 'w-8', 'text' => 'text-ui-sm'],
        'lg' => ['h' => 'h-10', 'px' => 'px-2.5', 'w' => 'w-10', 'text' => 'text-base'],
    ];

    $s = $sizes[$size] ?? $sizes['md'];
    $radius = \Anzims\Satura\Support\Sizes::radiusFor($size);
    $boxed = $variant === 'boxed';

    $base = 'inline-flex items-center justify-center font-medium transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-ui-accent';
    $arrow = $boxed
        ? $base.' '.$s['h'].' '.$s['w'].' '.$radius.' text-ui-muted hover:bg-ui-surface hover:text-ui-fg'
        : $base.' '.$s['h'].' '.$s['w'].' '.$radius.' text-ui-muted/60 hover:text-ui-fg';
    $page = $base.' '.$s['h'].' '.$s['px'].' '.$radius.' '.$s['text'];

    $currentClasses = $boxed
        ? 'bg-ui-accent text-ui-accent-fg'
        : 'font-semibold text-ui-fg underline underline-offset-4';

    $linkClasses = $boxed
        ? 'text-ui-fg hover:bg-ui-surface'
        : 'text-ui-muted/60 hover:text-ui-fg';
@endphp

<nav aria-label="Пагинация" {{ $attributes->class(['flex flex-wrap items-center gap-1', $s['text']]) }}>
    @if ($current > 1)
        <a href="{{ $link($current - 1) }}" rel="prev" aria-label="Предыдущая страница" class="{{ $arrow }}">
            <x-sat::icon name="chevron-down" size="2xs" class="rotate-90" />
        </a>
    @else
        <span aria-disabled="true" class="{{ $arrow }} cursor-not-allowed opacity-40">
            <x-sat::icon name="chevron-down" size="2xs" class="rotate-90" />
        </span>
    @endif

    @foreach ($pages as $pageNumber)
        @if ($pageNumber === null)
            <span aria-hidden="true" class="{{ $page }} text-ui-muted">…</span>
        @elseif ($pageNumber === $current)
            <span aria-current="page" class="{{ $page }} {{ $currentClasses }}">{{ $pageNumber }}</span>
        @else
            <a href="{{ $link($pageNumber) }}" class="{{ $page }} {{ $linkClasses }}">{{ $pageNumber }}</a>
        @endif
    @endforeach

    @if ($current < $last)
        <a href="{{ $link($current + 1) }}" rel="next" aria-label="Следующая страница" class="{{ $arrow }}">
            <x-sat::icon name="chevron-down" size="2xs" class="-rotate-90" />
        </a>
    @else
        <span aria-disabled="true" class="{{ $arrow }} cursor-not-allowed opacity-40">
            <x-sat::icon name="chevron-down" size="2xs" class="-rotate-90" />
        </span>
    @endif
</nav>