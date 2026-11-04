<?php

declare(strict_types=1);

it('renders a square button with an accessible label', function (): void {
    $this->blade('<x-sat::icon-button label="Добавить"><x-sat::icon name="plus" /></x-sat::icon-button>')
        ->assertSee('aria-label="Добавить"', false)
        ->assertDontSee('title=', false)
        ->assertSee('size-10', false)
        ->assertSee('rounded-[10px]', false)
        ->assertSee('text-ui-accent', false);
});

it('scales the square with the size', function (string $size, string $square, string $radius): void {
    $this->blade('<x-sat::icon-button size="'.$size.'" label="X"><x-sat::icon name="x-mark" /></x-sat::icon-button>')
        ->assertSee($square, false)
        ->assertSee($radius, false);
})->with([
    ['3xs', 'size-5', 'rounded-[5px]'],
    ['sm', 'size-8', 'rounded-ui-md'],
    ['3xl', 'size-16', 'rounded-[16px]'],
]);

it('accepts colour and variant', function (): void {
    $this->blade('<x-sat::icon-button color="red" variant="solid" label="Удалить"><x-sat::icon name="x-mark" /></x-sat::icon-button>')
        ->assertSee('bg-red-600', false);
});

it('scales the icon together with the button', function (): void {
    $this->blade('<x-sat::icon-button icon="plus" size="3xl" label="X" />')
        ->assertSee('<svg', false)
        ->assertSee('size-16', false)
        ->assertSee('size-8', false);
});

it('supports a circular shape', function (): void {
    $this->blade('<x-sat::icon-button icon="x-mark" shape="circle" label="Закрыть" />')
        ->assertSee('rounded-full', false)
        ->assertDontSee('rounded-[10px]', false);
});
