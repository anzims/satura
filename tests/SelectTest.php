<?php

declare(strict_types=1);

it('renders a native select with options and a single chevron', function (): void {
    $this->blade('<x-sat::select label="Статус" name="status"><option value="1">Один</option></x-sat::select>')
        ->assertSee('<select', false)
        ->assertSee('<option value="1">Один</option>', false)
        ->assertSee('appearance-none', false)
        ->assertSee('bg-none', false)
        ->assertSee('bg-none bg-ui-surface', false)
        ->assertSee('Статус', false);
});

it('hides the native arrow of the forms plugin', function (): void {
    $html = $this->blade('<x-sat::select><option>A</option></x-sat::select>');

    expect(substr_count((string) $html, '<svg'))->toBe(1);
});

it('scales the chevron and the end padding with the size', function (): void {
    $this->blade('<x-sat::select size="3xs"><option>A</option></x-sat::select>')
        ->assertSee('pe-5', false)
        ->assertSee('end-1', false);

    $this->blade('<x-sat::select size="3xl"><option>A</option></x-sat::select>')
        ->assertSee('pe-12', false)
        ->assertSee('end-4', false);
});

it('fades the chevron while the list is open', function (): void {
    $this->blade('<x-sat::select><option>A</option></x-sat::select>')
        ->assertSee('group relative', false)
        ->assertSee('group-focus-within:opacity-40', false);
});

it('supports colour and error', function (): void {
    $this->blade('<x-sat::select size="lg" color="green" error="Выберите" />')
        ->assertSee('h-11', false)
        ->assertSee('border-ui-danger', false);
});
