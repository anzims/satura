@props([
    'name' => null,
    'size' => 'md',
    'color' => null,
    'circle' => false,
])

@php
    $hasIcon = $name !== null && view()->exists('satura::icons.'.$name);

    $circleMode = match (true) {
        $circle === true, $circle === 'solid' => 'solid',
        $circle === 'outline' => 'outline',
        default => null,
    };

    $circleTone = match ($circleMode) {
        'solid' => \Anzims\Satura\Support\Colors::circle($color ?? 'accent'),
        'outline' => \Anzims\Satura\Support\Colors::circleOutline($color ?? 'accent'),
        default => null,
    };

    $iconTone = $color !== null ? \Anzims\Satura\Support\Colors::icon($color) : null;
@endphp

<span {{ $attributes->class(array_filter([
    'inline-flex shrink-0 items-center justify-center',
    $circleMode !== null ? 'size-fit' : null,
    $circleMode !== null ? 'rounded-full' : null,
    $circleTone,
    $circleMode !== null ? \Anzims\Satura\Support\Sizes::circlePaddingFor($size) : null,
])) }}>
    <span class="{{ \Anzims\Satura\Support\Sizes::iconFor($size) }} inline-flex [&_svg]:block [&_svg]:size-full {{ $circleMode !== null ? '' : $iconTone }}">
        @if ($hasIcon)
            @include('satura::icons.'.$name)
        @else
            {{ $slot }}
        @endif
    </span>
</span>