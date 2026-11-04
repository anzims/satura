@props([
    'text' => '',
    'color' => 'accent',
    'duration' => 4000,
])

<div
    data-toast-text="{{ $text }}"
    data-toast-color="{{ $color }}"
    onclick="window.dispatchEvent(new CustomEvent('sat-toast', { detail: { text: this.dataset.toastText, color: this.dataset.toastColor, duration: {{ (int) $duration }} } }))"
    {{ $attributes->class(['contents']) }}
>
    {{ $slot }}
</div>