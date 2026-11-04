<?php

declare(strict_types=1);

it('renders a horizontal rule', function (): void {
    $this->blade('<x-sat::divider />')
        ->assertSee('<hr', false)
        ->assertSee('border-t', false)
        ->assertSee('border-ui-border', false);
});

it('renders a vertical separator', function (): void {
    $this->blade('<x-sat::divider orientation="vertical" />')
        ->assertSee('role="separator"', false)
        ->assertSee('aria-orientation="vertical"', false)
        ->assertSee('border-l', false);
});

it('renders a coloured divider with adjustable thickness', function (): void {
    $this->blade('<x-sat::divider color="red" thickness="thick" />')
        ->assertSee('border-t-4', false)
        ->assertSee('border-red-200', false)
        ->assertSee('dark:border-red-800', false);
});

it('puts an icon in the middle', function (): void {
    $this->blade('<x-sat::divider icon="plus" color="green" />')
        ->assertSee('flex-1', false)
        ->assertSee('<svg', false)
        ->assertSee('text-green-600', false);
});

it('puts a circled icon in the centre', function (): void {
    $this->blade('<x-sat::divider icon="check" circle color="green" />')
        ->assertSee('rounded-full', false)
        ->assertSee('bg-green-100', false);

    $this->blade('<x-sat::divider icon="plus" circle="outline" color="blue" />')
        ->assertSee('border-blue-300', false);
});
