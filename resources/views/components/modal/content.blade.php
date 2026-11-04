@props([
    'title' => null,
    'description' => null,
])

<dialog
    data-sat-modal
    x-ref="dialog"
    x-effect="open ? $refs.dialog.showModal() : ($refs.dialog.open && $refs.dialog.close())"
    x-on:close="open = false"
    x-on:click="if ($event.target === $refs.dialog) open = false"
    {{ $attributes->class([
        'm-auto w-full overflow-hidden rounded-ui-lg border border-ui-border bg-ui-surface p-0 text-ui-fg shadow-xl ',
        'max-w-[var(--sat-modal-width)]',
    ]) }}
>
    <div class="flex items-start justify-between gap-3 border-b border-ui-border px-4 py-3">
        <div class="grid gap-0.5">
            @if ($title)
                <h2 class="text-base font-medium">{{ $title }}</h2>
            @endif
            @if ($description)
                <p class="text-ui-sm text-ui-muted">{{ $description }}</p>
            @endif
            {{ $header ?? '' }}
        </div>

        <button
            type="button"
            aria-label="Закрыть"
            x-on:click="open = false"
            class="inline-flex size-6 shrink-0 cursor-pointer items-center justify-center rounded-full text-ui-muted transition-colors hover:bg-ui-bg hover:text-ui-fg focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-ui-accent"
        >
            <x-sat::icon name="x-mark" size="2xs" />
        </button>
    </div>

    <div class="px-4 py-3 text-ui-sm">
        {{ $slot }}
    </div>

    @isset($footer)
        <div class="flex flex-wrap items-center justify-end gap-2 border-t border-ui-border px-4 py-3">
            {{ $footer }}
        </div>
    @endisset
</dialog>