@props([
    'orientation' => 'horizontal',
    'color' => 'accent',
    'thickness' => 'thin',
    'icon' => null,
    'circle' => false,
])

@php
    $line = \Anzims\Satura\Support\Colors::line($color);
    $horizontal = [
        'thin' => 'border-t',
        'medium' => 'border-t-2',
        'thick' => 'border-t-4',
    ];
    $vertical = [
        'thin' => 'border-l',
        'medium' => 'border-l-2',
        'thick' => 'border-l-4',
    ];
    $hEdge = $horizontal[$thickness] ?? $horizontal['thin'];
    $vEdge = $vertical[$thickness] ?? $vertical['thin'];
@endphp

@if ($orientation === 'vertical')
    <div
        role="separator"
        aria-orientation="vertical"
        {{ $attributes->class(['w-0 self-stretch', $vEdge, $line]) }}
    ></div>
@elseif ($icon)
    <div {{ $attributes->class(['flex w-full items-center gap-3']) }}>
        <span class="h-0 flex-1 {{ $hEdge }} {{ $line }}"></span>
        <x-sat::icon :name="$icon" size="sm" :color="$color" :circle="$circle" />
        <span class="h-0 flex-1 {{ $hEdge }} {{ $line }}"></span>
    </div>
@else
    <hr {{ $attributes->class(['border-0', $hEdge, $line]) }}>
@endif