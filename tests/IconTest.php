<?php

declare(strict_types=1);

it('renders a built-in icon by name', function (): void {
    $this->blade('<x-sat::icon name="check" />')
        ->assertSee('<svg', false)
        ->assertSee('size-5', false);
});

it('scales the icon box', function (): void {
    $this->blade('<x-sat::icon name="search" size="3xs" />')->assertSee('size-2.5', false);
    $this->blade('<x-sat::icon name="search" size="xl" />')->assertSee('size-6', false);
});

it('falls back to the slot for custom svg', function (): void {
    $this->blade('<x-sat::icon size="sm"><svg viewBox="0 0 24 24"></svg></x-sat::icon>')
        ->assertSee('<svg viewBox="0 0 24 24">', false)
        ->assertSee('size-4', false);
});

it('supports colour and a circular background', function (): void {
    $this->blade('<x-sat::icon name="check" color="red" />')
        ->assertSee('text-red-600', false);

    $this->blade('<x-sat::icon name="check" circle color="green" size="lg" />')
        ->assertSee('rounded-full', false)
        ->assertSee('bg-green-100', false)
        ->assertSee('text-green-700', false)
        ->assertSee('p-1', false);
});

it('renders a circle with border and without background', function (): void {
    $this->blade('<x-sat::icon name="check" circle="outline" color="red" size="lg" />')
        ->assertSee('rounded-full', false)
        ->assertSee('border-red-300', false)
        ->assertSee('text-red-700', false)
        ->assertDontSee('bg-red-100', false);
});
