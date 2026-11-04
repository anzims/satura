@props([
    'width' => 'lg',
    'dim' => 'md',
])

@php
    $presets = [
        'xs' => '20rem',
        'sm' => '24rem',
        'md' => '28rem',
        'lg' => '32rem',
        'xl' => '36rem',
        '2xl' => '42rem',
        '3xl' => '48rem',
    ];

    // Можно передать готовый пресет или любую CSS-длину: 520px, 40rem, 60vw.
    $modalWidth = $presets[$width] ?? (is_string($width) && $width !== '' ? $width : $presets['lg']);

    $dims = ['none' => '0', 'sm' => '0.25', 'md' => '0.5', 'lg' => '0.75'];
    $alpha = $dims[$dim] ?? $dims['md'];
@endphp

<div
    x-data="{ open: false }"
    style="--sat-modal-width: {{ $modalWidth }}; --sat-backdrop-alpha: {{ $alpha }}"
    {{ $attributes->class(['contents']) }}
>
    {{ $slot }}
</div>