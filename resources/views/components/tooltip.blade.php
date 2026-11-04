@props([
    'text' => null,
    'placement' => 'top',
    'offset' => 'sm',
    'delay' => 120,
    'arrow' => false,
    'maxWidth' => 'xs',
])

@php
    $parts = explode('-', (string) $placement);
    $side = $parts[0] ?? 'top';
    $align = $parts[1] ?? 'center';

    if (! in_array($side, ['top', 'bottom', 'left', 'right'], true)) {
        $side = 'top';
    }

    $corner = null;

    if (in_array($placement, ['top-left', 'top-right', 'bottom-left', 'bottom-right'], true)) {
        $corner = str_ends_with((string) $placement, 'left') ? 'left' : 'right';
        $side = str_starts_with((string) $placement, 'top') ? 'top' : 'bottom';
        $align = 'corner';
    } elseif (! in_array($align, ['start', 'center', 'end'], true)) {
        $align = 'center';
    }

    $gap = $offset === 'none' ? 0 : 6;
    $delay = max(0, (int) $delay);

    $widths = [
        'none' => '',
        'xs' => 'max-w-xs',
        'sm' => 'max-w-sm',
        'md' => 'max-w-md',
    ];

    $width = $widths[$maxWidth] ?? $widths['xs'];

    $arrowPosition = match ($side) {
        'bottom' => 'bottom-full left-1/2 -translate-x-1/2 translate-y-1/2',
        'left' => 'left-full top-1/2 -translate-y-1/2 -translate-x-1/2',
        'right' => 'right-full top-1/2 -translate-y-1/2 translate-x-1/2',
        default => 'top-full left-1/2 -translate-x-1/2 -translate-y-1/2',
    };
@endphp

<span
    x-data="{
        open: false,
        timer: null,
        top: 0,
        left: 0,
        side: '{{ $side }}',
        align: '{{ $align }}',
        corner: '{{ $corner ?? '' }}',
        gap: {{ $gap }},
        show() {
            this.timer = setTimeout(() => {
                this.open = true;
                this.$nextTick(() => this.position());
            }, {{ $delay }});
        },
        hide() {
            clearTimeout(this.timer);
            this.open = false;
        },
        position() {
            const trigger = this.$refs.trigger.getBoundingClientRect();
            const tip = this.$refs.tip.getBoundingClientRect();
            const margin = 8;

            let top = 0;
            let left = 0;

            if (this.side === 'top' || this.side === 'bottom') {
                top = this.side === 'top'
                    ? trigger.top - tip.height - this.gap
                    : trigger.bottom + this.gap;

                if (this.align === 'corner') {
                    left = this.corner === 'left' ? trigger.left - tip.width : trigger.right;
                } else if (this.align === 'start') { left = trigger.left; }
                else if (this.align === 'end') { left = trigger.right - tip.width; }
                else { left = trigger.left + trigger.width / 2 - tip.width / 2; }
            } else {
                left = this.side === 'left'
                    ? trigger.left - tip.width - this.gap
                    : trigger.right + this.gap;

                if (this.align === 'start') { top = trigger.top; }
                else if (this.align === 'end') { top = trigger.bottom - tip.height; }
                else { top = trigger.top + trigger.height / 2 - tip.height / 2; }
            }

            this.top = Math.min(Math.max(margin, top), window.innerHeight - tip.height - margin);
            this.left = Math.min(Math.max(margin, left), window.innerWidth - tip.width - margin);
        },
    }"
    x-on:mouseenter="show()"
    x-on:mouseleave="hide()"
    x-on:focusin="show()"
    x-on:focusout="hide()"
    x-on:keydown.escape="hide()"
    {{ $attributes->class(['inline-flex']) }}
>
    <span x-ref="trigger" class="inline-flex">{{ $slot }}</span>

    <template x-teleport="body">
        <span
            x-ref="tip"
            x-show="open"
            x-cloak
            role="tooltip"
            :style="'top: ' + top + 'px; left: ' + left + 'px'"
            class="pointer-events-none fixed z-50 rounded-ui-sm bg-neutral-900 px-2 py-1 text-ui-2xs text-white shadow-lg dark:bg-neutral-100 dark:text-neutral-900 {{ $width }}"
        >
            {{ $text ?? '' }}

            @if ($arrow)
                <span class="absolute size-1.5 rotate-45 bg-neutral-900 dark:bg-neutral-100 {{ $arrowPosition }}" aria-hidden="true"></span>
            @endif
        </span>
    </template>
</span>
