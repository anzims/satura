<?php

declare(strict_types=1);

it('renders initials from the name', function (): void {
    $this->blade('<x-sat::avatar name="Иван Петров" />')
        ->assertSee('role="img"', false)
        ->assertSee('aria-label="Иван Петров"', false)
        ->assertSee('ИП', false)
        ->assertSee('size-10', false)
        ->assertSee('rounded-full', false);
});

it('renders an image when src is given', function (): void {
    $this->blade('<x-sat::avatar src="/img/a.png" alt="Фото" />')
        ->assertSee('<img src="/img/a.png"', false)
        ->assertSee('alt="Фото"', false)
        ->assertSee('object-cover', false);
});

it('supports a square shape and a palette colour', function (): void {
    $this->blade('<x-sat::avatar name="Анна" shape="square" color="green" size="3xl" />')
        ->assertSee('size-16', false)
        ->assertSee('rounded-[16px]', false)
        ->assertSee('bg-green-100', false);
});

it('renders a status dot', function (): void {
    $this->blade('<x-sat::avatar name="Пётр" status="online" />')
        ->assertSee('bg-green-500', false)
        ->assertSee('ring-ui-bg', false);

    $this->blade('<x-sat::avatar name="Пётр" status="busy" />')->assertSee('bg-red-500', false);
});

it('stacks avatars in a group', function (): void {
    $this->blade('<x-sat::avatar-group><x-sat::avatar name="А Б" /><x-sat::avatar name="В Г" /></x-sat::avatar-group>')
        ->assertSee('-space-x-2', false)
        ->assertSee('[&amp;&gt;*]:ring-2', false);
});

it('does not clip the status dot', function (): void {
    $html = (string) $this->blade('<x-sat::avatar name="Пётр" status="online" />');

    $root = substr($html, strpos($html, '<span'), strpos($html, '>') - strpos($html, '<span'));

    expect($root)->not->toContain('overflow-hidden');
    expect($html)->toContain('absolute end-0 bottom-0');
    expect($html)->toContain('size-2.5');
});

it('renders a package icon instead of initials', function (): void {
    $this->blade('<x-sat::avatar icon="user" color="green" />')
        ->assertSee('<svg', false)
        ->assertSee('bg-green-100', false);
});

it('accepts a custom icon through the slot', function (): void {
    $this->blade('<x-sat::avatar><x-sat::icon name="search" /></x-sat::avatar>')
        ->assertSee('<svg', false);
});
