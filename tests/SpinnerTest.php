<?php

declare(strict_types=1);

it('is decorative by default', function (): void {
    $this->blade('<x-sat::spinner />')
        ->assertSee('aria-hidden="true"', false)
        ->assertSee('animate-spin', false)
        ->assertSee('size-5', false)
        ->assertDontSee('role="status"', false);
});

it('announces itself when a label is given', function (): void {
    $this->blade('<x-sat::spinner label="Загрузка" />')
        ->assertSee('role="status"', false)
        ->assertSee('aria-label="Загрузка"', false)
        ->assertDontSee('aria-hidden', false);
});

it('scales with the size scale', function (): void {
    $this->blade('<x-sat::spinner size="3xs" />')->assertSee('size-2.5', false);
    $this->blade('<x-sat::spinner size="3xl" />')->assertSee('size-8', false);
});

it('accepts a colour from the palette', function (): void {
    $this->blade('<x-sat::spinner color="red" />')
        ->assertSee('text-red-600', false)
        ->assertSee('dark:text-red-400', false);
});
