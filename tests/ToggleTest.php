<?php

declare(strict_types=1);

it('renders a switch with a peer track', function (): void {
    $this->blade('<x-sat::toggle label="Уведомления" name="notify" />')
        ->assertSee('role="switch"', false)
        ->assertSee('peer sr-only', false)
        ->assertSee('peer-checked:bg-ui-accent', false)
        ->assertSee('Уведомления', false);
});

it('renders the checked state', function (): void {
    $this->blade('<x-sat::toggle checked />')
        ->assertSee('checked', false);
});

it('scales the track and the thumb', function (): void {
    $this->blade('<x-sat::toggle size="3xl" color="blue" />')
        ->assertSee('h-12', false)
        ->assertSee('size-10', false)
        ->assertSee('peer-checked:after:translate-x-10', false)
        ->assertSee('peer-checked:bg-blue-600', false);
});

it('renders a Livewire loading overlay for the given target', function (): void {
    $this->blade('<x-sat::toggle target="toggleNumber5" wire:model="notify" />')
        ->assertSee('wire:loading.flex', false)
        ->assertSee('wire:target="toggleNumber5"', false)
        ->assertSee('animate-spin', false);
});

it('has no overlay without a target', function (): void {
    $this->blade('<x-sat::toggle />')
        ->assertDontSee('wire:loading', false);
});

it('can show the saving indicator statically', function (): void {
    $this->blade('<x-sat::toggle loading />')
        ->assertSee('animate-spin', false)
        ->assertDontSee('wire:loading', false);
});

it('renders the slider variant with its own size scale', function (): void {
    $this->blade('<x-sat::toggle variant="slider" checked />')
        ->assertSee('h-7 w-12', false)
        ->assertSee('after:size-6', false)
        ->assertSee('peer-checked:after:translate-x-5', false);

    $this->blade('<x-sat::toggle variant="slider" size="3xs" checked />')
        ->assertSee('h-4 w-8', false)
        ->assertSee('after:size-3', false);
});

it('swaps a single label with the state', function (): void {
    $this->blade('<x-sat::toggle offLabel="Выключен" onLabel="Включён" />')
        ->assertSee('peer-checked:hidden', false)
        ->assertSee('Выключен', false)
        ->assertSee('Включён', false);
});

it('renders two labels around the slider', function (): void {
    $this->blade('<x-sat::toggle variant="slider" offLabel="Light" onLabel="Dark" />')
        ->assertSee('Light', false)
        ->assertSee('Dark', false)
        ->assertSee('peer-checked:text-ui-muted', false)
        ->assertSee('peer-checked:text-ui-fg', false);
});

it('shows the saving spinner inside the track', function (): void {
    $html = (string) $this->blade('<x-sat::toggle loading checked label="Сохраняется" />');

    $start = strpos($html, '<label');
    $end = strpos($html, '</label>', $start);

    expect(substr($html, $start, $end - $start))
        ->toContain('animate-spin')
        ->toContain('text-ui-muted');
});

it('accepts a separate colour for the off state', function (): void {
    $this->blade('<x-sat::toggle color="green" offColor="red" />')
        ->assertSee('bg-red-600', false)
        ->assertSee('dark:bg-red-500', false)
        ->assertSee('peer-checked:bg-green-600', false);
});

it('draws the off track with a token that is visible in dark mode', function (): void {
    $this->blade('<x-sat::toggle />')->assertSee('bg-ui-switch-off', false);
    $this->blade('<x-sat::toggle variant="slider" />')->assertSee('bg-ui-switch-off', false);
});

it('puts the saving spinner above the thumb', function (): void {
    $this->blade('<x-sat::toggle loading />')->assertSee('absolute inset-0 z-10', false);
});
