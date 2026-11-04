@props([
    'value' => '#2563eb',
    'name' => null,
    'palette' => [
        '#dc2626',
        '#d97706',
        '#16a34a',
        '#059669',
        '#0284c7',
        '#2563eb',
        '#7c3aed',
        '#db2777',
    ],
])

<div x-data="{ color: '{{ $value }}' }" {{ $attributes->class(['grid content-start gap-2']) }}>
    @if ($palette !== [])
        <div class="flex flex-wrap items-center gap-2" role="group" aria-label="Палитра">
            @foreach ($palette as $swatch)
                <button
                    type="button"
                    aria-label="{{ $swatch }}"
                    x-on:click="color = '{{ $swatch }}'"
                    class="size-6 cursor-pointer rounded-full border border-ui-border transition-shadow focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-ui-accent"
                    :class="color.toLowerCase() === '{{ strtolower($swatch) }}' ? 'ring-2 ring-ui-accent ring-offset-2 ring-offset-ui-bg' : ''"
                    style="background-color: {{ $swatch }}"
                ></button>
            @endforeach
        </div>
    @endif

    <div class="flex items-center gap-2">
        <input
            type="color"
            x-model="color"
            aria-label="Выбрать цвет"
            class="size-8 cursor-pointer rounded-ui-md border border-ui-border bg-ui-bg p-0.5"
        />

        <input
            type="text"
            x-model="color"
            maxlength="7"
            spellcheck="false"
            aria-label="HEX-значение"
            class="h-8 w-28 rounded-ui-md border border-ui-border bg-ui-bg px-2 font-mono text-ui-sm text-ui-fg focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-ui-accent"
        />

        @if ($name)
            <input type="hidden" name="{{ $name }}" :value="color" />
        @endif
    </div>
</div>