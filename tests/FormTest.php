<?php

declare(strict_types=1);

it('renders an input with a label and wires the id', function (): void {
    $html = $this->blade('<x-sat::input label="Email" name="email" />');

    $html->assertSee('Email', false)
        ->assertSee('name="email"', false)
        ->assertSee('for="sat-', false)
        ->assertSee('id="sat-', false)
        ->assertDontSee('aria-invalid', false);
});

it('keeps the given id for the label', function (): void {
    $this->blade('<x-sat::input id="email" label="Email" />')
        ->assertSee('id="email"', false)
        ->assertSee('for="email"', false);
});

it('supports the eight size steps', function (string $size, string $height): void {
    $this->blade('<x-sat::input size="'.$size.'" />')
        ->assertSee($height, false);
})->with([
    ['3xs', 'h-5'],
    ['2xs', 'h-6'],
    ['xs', 'h-7'],
    ['sm', 'h-8'],
    ['md', 'h-10'],
    ['lg', 'h-11'],
    ['xl', 'h-12'],
    ['2xl', 'h-14'],
    ['3xl', 'h-16'],
]);

it('renders an error state', function (): void {
    $this->blade('<x-sat::input label="Email" error="Required" />')
        ->assertSee('aria-invalid="true"', false)
        ->assertSee('Required', false)
        ->assertSee('border-ui-danger', false);
});

it('renders a hint when there is no error', function (): void {
    $this->blade('<x-sat::input label="Email" hint="Work address" />')
        ->assertSee('Work address', false)
        ->assertSee('text-ui-muted', false);
});

it('styles disabled and readonly inputs', function (): void {
    $this->blade('<x-sat::input disabled />')
        ->assertSee('disabled="disabled"', false)
        ->assertSee('disabled:bg-ui-bg', false);

    $this->blade('<x-sat::input readonly />')
        ->assertSee('readonly="readonly"', false)
        ->assertSee('readonly:bg-ui-bg', false);
});

it('renders a field wrapper with slot, label and required mark', function (): void {
    $this->blade('<x-sat::field label="Name" required><input name="name"></x-sat::field>')
        ->assertSee('Name', false)
        ->assertSee('name="name"', false)
        ->assertSee('*', false);
});

it('marks a required label', function (): void {
    $this->blade('<x-sat::label for="x" required>Login</x-sat::label>')
        ->assertSee('for="x"', false)
        ->assertSee('aria-hidden="true"', false);
});

it('renders an error component only with a message', function (): void {
    $this->blade('<x-sat::error message="Broken" />')
        ->assertSee('role="alert"', false)
        ->assertSee('Broken', false);

    $this->blade('<x-sat::error />')
        ->assertDontSee('role="alert"', false);
});

it('uses the accent token colours by default', function (): void {
    $this->blade('<x-sat::input />')
        ->assertSee('border-ui-border', false)
        ->assertSee('focus:border-ui-accent', false);
});

it('supports tailwind colour borders', function (): void {
    $this->blade('<x-sat::input type="email" color="red" placeholder="you@example.com" />')
        ->assertSee('border-red-300', false)
        ->assertSee('focus:border-red-500', false)
        ->assertSee('dark:border-red-700', false);
});

it('lets the error state win over the colour', function (): void {
    $this->blade('<x-sat::input color="red" error="Required" />')
        ->assertSee('border-ui-danger', false)
        ->assertDontSee('border-red-300', false);
});

it('scales the input radius with the size', function (string $size, string $radius): void {
    $this->blade('<x-sat::input size="'.$size.'" />')
        ->assertSee($radius, false);
})->with([
    ['3xs', 'rounded-[5px]'],
    ['2xs', 'rounded-[6px]'],
    ['xs', 'rounded-[7px]'],
    ['sm', 'rounded-ui-md'],
    ['md', 'rounded-[10px]'],
    ['3xl', 'rounded-[16px]'],
]);
