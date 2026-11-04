@props([
    'title' => null,
    'description' => null,
    'size' => 'md',
    'padding' => null,
    'heading' => 3,
])

@php
    // Секции получают симметричный паддинг, а внешние края карточки добираются
    // её собственным паддингом: тогда зазор у разделителя и у края одинаковый,
    // а внутри секции расстояния сверху и снизу равны.
    $presets = [
        'xs' => ['px' => 'px-2', 'py' => 'py-1', 'root' => 'py-1', 'title' => 'text-ui-xs', 'desc' => 'text-ui-2xs', 'gap' => 'gap-0.5'],
        'sm' => ['px' => 'px-3', 'py' => 'py-1.5', 'root' => 'py-1.5', 'title' => 'text-ui-sm', 'desc' => 'text-ui-xs', 'gap' => 'gap-0.5'],
        'md' => ['px' => 'px-4', 'py' => 'py-2', 'root' => 'py-2', 'title' => 'text-base', 'desc' => 'text-ui-sm', 'gap' => 'gap-1'],
        'lg' => ['px' => 'px-6', 'py' => 'py-2.5', 'root' => 'py-2.5', 'title' => 'text-lg', 'desc' => 'text-ui-sm', 'gap' => 'gap-1'],
    ];

    if ($padding === 'none') {
        $presets['none'] = ['px' => '', 'py' => '', 'root' => '', 'title' => 'text-base', 'desc' => 'text-ui-sm', 'gap' => 'gap-1'];
    }

    $p = $padding !== null && isset($presets[$padding])
        ? $presets[$padding]
        : ($presets[$size] ?? $presets['md']);

    $compact = $size === 'sm' || $size === 'xs';

    $level = max(2, min(6, (int) $heading));
    $titleSize = $padding === null ? $p['title'] : ($compact ? 'text-ui-sm' : 'text-base');
    $descriptionSize = $padding === null ? $p['desc'] : ($compact ? 'text-ui-xs' : 'text-ui-sm');
    $gap = $p['gap'];
    $sectionPad = trim($p['px'].' '.$p['py']);

    $headerActions = $headerActions ?? null;
    $footerActions = $footerActions ?? null;

    $customHeader = isset($header);
    $customFooter = isset($footer);

    $hasHeader = $customHeader || $title !== null || $description !== null || $headerActions !== null;
    $hasFooter = $customFooter || $footerActions !== null;
@endphp

<div {{ $attributes->class([
    'overflow-hidden rounded-ui-lg border border-ui-border bg-ui-surface text-ui-fg',
    $p['root'],
]) }}>
    @if ($hasHeader)
        <div class="flex items-start justify-between gap-3 border-b border-ui-border {{ $sectionPad }}">
            <div class="min-w-0 flex-1 {{ $customHeader ? '' : 'grid ' . $gap }}">
                @if ($customHeader)
                    {{ $header }}
                @else
                    @if ($title)
                        <h{{ $level }} class="{{ $titleSize }} font-medium">{{ $title }}</h{{ $level }}>
                    @endif
                    @if ($description)
                        <p class="{{ $descriptionSize }} text-ui-muted">{{ $description }}</p>
                    @endif
                @endif
            </div>

            @if ($headerActions !== null)
                <div class="flex shrink-0 items-center gap-2">
                    {{ $headerActions }}
                </div>
            @endif
        </div>
    @endif

    <div class="{{ $sectionPad }}">
        {{ $slot }}
    </div>

    @if ($hasFooter)
        <div class="flex items-center justify-between gap-3 border-t border-ui-border {{ $sectionPad }}">
            <div class="min-w-0 flex-1 {{ $customFooter ? '' : 'grid ' . $gap }}">
                {{ $footer ?? '' }}
            </div>

            @if ($footerActions !== null)
                <div class="flex shrink-0 items-center gap-2">
                    {{ $footerActions }}
                </div>
            @endif
        </div>
    @endif
</div>