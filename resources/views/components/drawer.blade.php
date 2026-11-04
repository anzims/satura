@props([
    'placement' => 'right',
    'width' => 'md',
    'dim' => 'md',
])

@php
    $widths = [
        'sm' => '20rem',
        'md' => '26rem',
        'lg' => '32rem',
        'xl' => '40rem',
    ];

    $drawerWidth = $widths[$width] ?? (is_string($width) && $width !== '' ? $width : $widths['md']);

    $start = $placement === 'left' ? '0' : 'auto';
    $end = $placement === 'right' ? '0' : 'auto';
    $from = $placement === 'left' ? '-100%' : '100%';

    $dims = ['none' => '0', 'sm' => '0.25', 'md' => '0.5', 'lg' => '0.75'];
    $alpha = $dims[$dim] ?? $dims['md'];
@endphp

<div
    x-data="{ open: false }"
    style="--sat-drawer-width: {{ $drawerWidth }}; --sat-drawer-start: {{ $start }}; --sat-drawer-end: {{ $end }}; --sat-drawer-from: {{ $from }}; --sat-backdrop-alpha: {{ $alpha }}"
    {{ $attributes->class(['contents']) }}
>
    {{ $slot }}
</div>