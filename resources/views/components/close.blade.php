@props([
    'size' => '2xs',
    'label' => 'Закрыть',
    'bare' => false,
    'title' => null,
])

<button
    type="button"
    aria-label="{{ $label }}"
    @if ($title) title="{{ $title }}" @endif
    {{ $attributes->class(array_filter([
        'inline-flex shrink-0 cursor-pointer items-center justify-center rounded-full text-ui-muted transition-colors',
        'hover:text-ui-fg',
        $bare ? null : 'hover:bg-ui-surface',
        'focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-ui-accent',
        'disabled:pointer-events-none disabled:opacity-50',
        $bare ? null : \Anzims\Satura\Support\Sizes::squareFor($size),
    ])) }}
>
    <x-sat::icon name="x-mark" :size="$size" />
</button>