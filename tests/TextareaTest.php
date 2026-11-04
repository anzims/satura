<?php

declare(strict_types=1);

it('renders a textarea with a label and rows', function (): void {
    $this->blade('<x-sat::textarea label="Комментарий" name="comment" rows="5" />')
        ->assertSee('<textarea', false)
        ->assertSee('rows="5"', false)
        ->assertSee('Комментарий', false)
        ->assertSee('for="sat-', false)
        ->assertSee('resize-y', false);
});

it('renders the error state and wins over the colour', function (): void {
    $this->blade('<x-sat::textarea color="red" error="Обязательно" />')
        ->assertSee('aria-invalid="true"', false)
        ->assertSee('border-ui-danger', false)
        ->assertDontSee('border-red-300', false);
});

it('scales with the size scale', function (): void {
    $this->blade('<x-sat::textarea size="3xs" />')->assertSee('min-h-10', false);
    $this->blade('<x-sat::textarea size="3xl" />')->assertSee('min-h-40', false);
});
