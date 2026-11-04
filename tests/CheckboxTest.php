<?php

declare(strict_types=1);

it('renders a custom checkbox with a label', function (): void {
    $this->blade('<x-sat::checkbox label="Согласен" name="agree" />')
        ->assertSee('type="checkbox"', false)
        ->assertSee('peer sr-only', false)
        ->assertSee('peer-checked:bg-ui-accent', false)
        ->assertSee('size-5', false)
        ->assertSee('Согласен', false);
});

it('accepts a palette colour and a size', function (): void {
    $this->blade('<x-sat::checkbox color="red" size="3xs" label="X" />')
        ->assertSee('peer-checked:bg-red-600', false)
        ->assertSee('dark:peer-checked:bg-red-500', false)
        ->assertSee('size-3', false);
});

it('renders a radio in its own component', function (): void {
    $this->blade('<x-sat::radio color="green" label="Вариант" />')
        ->assertSee('type="radio"', false)
        ->assertSee('rounded-full', false)
        ->assertSee('peer-checked:bg-green-600', false);
});
