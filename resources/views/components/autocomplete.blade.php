@props([
    'options' => [],
    'value' => '',
    'name' => null,
    'label' => null,
    'placeholder' => null,
    'size' => 'md',
    'limit' => 8,
    'layout' => false,
    'highlight' => null,
])

@php
    $field = \Anzims\Satura\Support\Sizes::fieldFor($size)
        .' '
        .\Anzims\Satura\Support\Sizes::radiusFor($size);
@endphp

<div
    x-data="{
        q: '{{ $value }}',
        open: false,
        active: -1,
        options: [],
        lat: {},
        cyr: {},
        limit: {{ (int) $limit }},
        layout: {{ $layout ? 'true' : 'false' }},
        map(text, table) {
            let out = '';

            for (const ch of text) {
                out += table[ch] ?? ch;
            }

            return out;
        },
        get needles() {
            const needle = this.q.trim().toLowerCase();

            if (! this.layout) { return [needle]; }

            return [needle, this.map(needle, this.lat), this.map(needle, this.cyr)];
        },
        get matches() {
            if (this.q.trim() === '') {
                return this.options.slice(0, this.limit);
            }

            return this.options.filter((option) => {
                const target = option.toLowerCase();

                return this.needles.some((needle) => needle !== '' && target.includes(needle));
            }).slice(0, this.limit);
        },
        move(step) {
            const count = this.matches.length;

            if (count === 0) { return; }

            this.open = true;
            this.active = (this.active + step + count) % count;
        },
        choose() {
            const option = this.matches[this.active] ?? this.matches[0];

            if (option) { this.pick(option); }
        },
        pick(option) {
            this.q = option;
            this.open = false;
            this.active = -1;
        },
    }"
    x-init="options = JSON.parse($el.dataset.options); const keys = JSON.parse($el.dataset.keyboard); lat = keys.latin; cyr = keys.cyrillic"
    data-options="{{ json_encode(array_values($options), JSON_UNESCAPED_UNICODE) }}"
    data-keyboard="{{ json_encode(\Anzims\Satura\Support\Keyboard::pairs(), JSON_UNESCAPED_UNICODE) }}"
    x-on:click.outside="open = false"
    x-on:keydown.escape="open = false"
    {{ $attributes->class(['relative grid content-start gap-1']) }}
>
    @if ($label)
        <span class="text-ui-sm text-ui-fg">{{ $label }}</span>
    @endif

    <input
        type="text"
        x-model="q"
        x-on:focus="open = true"
        x-on:input="open = true; active = -1"
        x-on:keydown.down.prevent="move(1)"
        x-on:keydown.up.prevent="move(-1)"
        x-on:keydown.enter.prevent="choose()"
        autocomplete="off"
        placeholder="{{ $placeholder }}"
        class="w-full rounded-ui-md border border-ui-border bg-ui-bg text-ui-fg placeholder:text-ui-muted focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-ui-accent {{ $field }}"
    />

    <div
        x-show="open && matches.length > 0"
        x-cloak
        class="absolute top-full z-50 mt-1 w-full overflow-hidden rounded-ui-md border border-ui-border bg-ui-surface py-1 shadow-lg"
    >
        <template x-for="(option, index) in matches" :key="option">
            <button
                type="button"
                x-on:click="pick(option)"
                x-on:mouseenter="active = index"
                class="flex w-full cursor-pointer items-center px-3 py-1.5 text-left text-ui-sm text-ui-fg transition-colors hover:bg-ui-bg"
                :class="active === index ? '{{ \Anzims\Satura\Support\Colors::highlight($highlight ?? 'accent') }}' : ''"
                x-text="option"
            ></button>
        </template>
    </div>

    @if ($name)
        <input type="hidden" name="{{ $name }}" :value="q" />
    @endif
</div>