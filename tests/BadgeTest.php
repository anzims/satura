<?php

declare(strict_types=1);

it('renders the accent tint by default', function (): void {
    $this->blade('<x-sat::badge>New</x-sat::badge>')
        ->assertSee('New', false)
        ->assertSee('bg-ui-accent/15', false)
        ->assertSee('text-ui-accent', false)
        ->assertSee('rounded-[7px]', false);
});

it('renders tailwind colours and variants', function (): void {
    $this->blade('<x-sat::badge color="red">Err</x-sat::badge>')
        ->assertSee('bg-red-50', false)
        ->assertSee('text-red-700', false)
        ->assertSee('border-red-200', false);

    $this->blade('<x-sat::badge color="green" variant="solid">Ok</x-sat::badge>')
        ->assertSee('bg-green-600', false)
        ->assertSee('border-transparent', false);

    $this->blade('<x-sat::badge color="sky" variant="outline">Info</x-sat::badge>')
        ->assertSee('border-sky-300', false);
});

it('scales the badge radius and padding with the size', function (): void {
    $this->blade('<x-sat::badge size="3xs">Tiny</x-sat::badge>')
        ->assertSee('rounded-[5px]', false)
        ->assertSee('text-ui-3xs', false);

    $this->blade('<x-sat::badge size="lg">Big</x-sat::badge>')
        ->assertSee('rounded-[11px]', false);
});
