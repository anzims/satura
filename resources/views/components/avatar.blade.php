@props([
    'src' => null,
    'name' => null,
    'alt' => null,
    'icon' => null,
    'size' => 'md',
    'shape' => 'circle',
    'color' => 'accent',
    'status' => null,
])

@php
    $initials = '';

    if ($name !== null) {
        $parts = preg_split('/\s+/', trim($name)) ?: [];
        $initials = mb_strtoupper(mb_substr($parts[0] ?? '', 0, 1).mb_substr($parts[1] ?? '', 0, 1));
    }

    $radius = $shape === 'square'
        ? \Anzims\Satura\Support\Sizes::radiusFor($size)
        : 'rounded-full';
@endphp

<span
    @if ($src === null && $name) role="img" aria-label="{{ $name }}" @endif
    {{ $attributes->class([
        'relative inline-flex shrink-0 items-center justify-center bg-ui-inset',
        \Anzims\Satura\Support\Sizes::squareFor($size),
        $radius,
    ]) }}
>
    <span class="flex size-full items-center justify-center overflow-hidden {{ $radius }}">
        @if ($src)
            <img src="{{ $src }}" alt="{{ $alt ?? $name }}" class="size-full object-cover">
        @elseif ($icon !== null || $slot->isNotEmpty())
            <span class="flex size-full items-center justify-center {{ \Anzims\Satura\Support\Colors::circle($color) }}">
                @if ($icon !== null)
                    <x-sat::icon :name="$icon" :size="$size" />
                @else
                    {{ $slot }}
                @endif
            </span>
        @else
            <span class="flex size-full items-center justify-center font-medium {{ \Anzims\Satura\Support\Sizes::textFor($size) }} {{ \Anzims\Satura\Support\Colors::circle($color) }}">
                {{ $initials }}
            </span>
        @endif
    </span>

    @if ($status)
        <span class="absolute end-0 bottom-0 block rounded-full ring-2 ring-ui-bg {{ \Anzims\Satura\Support\Sizes::statusFor($size) }} {{ \Anzims\Satura\Support\Colors::status($status) }}">
            <span class="sr-only">{{ $status }}</span>
        </span>
    @endif
</span>