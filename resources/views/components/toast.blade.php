@props([
    'position' => 'bottom-end',
])

@php
    $positions = [
        'bottom-end' => 'bottom-4 end-4',
        'bottom-start' => 'bottom-4 start-4',
        'top-end' => 'top-4 end-4',
        'top-start' => 'top-4 start-4',
    ];

    $pos = $positions[$position] ?? $positions['bottom-end'];
@endphp

<div
    x-data="{
        items: [],
        seq: 0,
        tones: {
            accent: 'border-ui-border',
            green: 'border-green-300 dark:border-green-700',
            red: 'border-red-300 dark:border-red-700',
            amber: 'border-amber-300 dark:border-amber-700',
        },
        push(detail) {
            const id = ++this.seq;
            this.items.push({ id: id, text: detail.text ?? '', color: detail.color ?? 'accent' });
            setTimeout(() => this.dismiss(id), detail.duration ?? 4000);
        },
        dismiss(id) {
            this.items = this.items.filter((item) => item.id !== id);
        },
    }"
    x-on:sat-toast.window="push($event.detail)"
    {{ $attributes->class(['pointer-events-none fixed z-[60] flex w-full max-w-sm flex-col gap-2', $pos]) }}
>
    <template x-for="item in items" :key="item.id">
        <div
            x-transition.opacity.duration.150ms
            class="pointer-events-auto flex items-start gap-2 rounded-ui-md border bg-ui-surface px-3 py-2 text-ui-sm text-ui-fg shadow-lg"
            :class="tones[item.color] ?? tones.accent"
        >
            <span class="min-w-0 flex-1" x-text="item.text"></span>

            <button
                type="button"
                aria-label="Закрыть"
                x-on:click="dismiss(item.id)"
                class="inline-flex size-5 shrink-0 cursor-pointer items-center justify-center rounded-full text-ui-muted transition-colors hover:bg-ui-bg hover:text-ui-fg"
            >
                <x-sat::icon name="x-mark" size="3xs" />
            </button>
        </div>
    </template>
</div>