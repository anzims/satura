<?php

declare(strict_types=1);

it('renders an accessible close button', function (): void {
    $this->blade('<x-sat::close />')
        ->assertSee('type="button"', false)
        ->assertSee('aria-label="Закрыть"', false)
        ->assertDontSee('title=', false)
        ->assertSee('rounded-full', false)
        ->assertSee('size-6', false)
        ->assertSee('<svg', false);
});

it('allows a custom label, size and extra attributes', function (): void {
    $this->blade('<x-sat::close size="xs" label="Убрать" wire:click="remove(1)" />')
        ->assertSee('aria-label="Убрать"', false)
        ->assertSee('size-7', false)
        ->assertSee('wire:click="remove(1)"', false);
});

it('can render without internal padding', function (): void {
    $html = (string) $this->blade('<x-sat::close bare size="3xs" label="Убрать" />');

    expect($html)->toContain('size-2.5');
    expect(substr_count($html, 'size-5'))->toBe(0);
});

it('shows a native title only when asked', function (): void {
    $this->blade('<x-sat::close title="Подсказка браузера" />')
        ->assertSee('title="Подсказка браузера"', false)
        ->assertSee('aria-label="Закрыть"', false);
});
