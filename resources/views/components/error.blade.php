@props([
    'message' => null,
])

@if ($message)
    <p {{ $attributes->class(['text-ui-sm text-ui-danger']) }} role="alert">
        {{ $message }}
    </p>
@endif