<?php

declare(strict_types=1);

it('renders an empty state with a default icon, title and description', function (): void {
    $this->blade('<x-sat::empty-state title="Ничего нет" description="Добавьте первую запись" />')
        ->assertSee('Ничего нет', false)
        ->assertSee('Добавьте первую запись', false)
        ->assertSee('rounded-full', false)
        ->assertSee('<svg', false)
        ->assertSee('py-10', false);
});

it('renders actions and a compact variant', function (): void {
    $this->blade('<x-sat::empty-state compact title="Пусто"><x-slot:actions><button>Создать</button></x-slot:actions></x-sat::empty-state>')
        ->assertSee('Создать', false)
        ->assertSee('py-6', false)
        ->assertDontSee('py-10', false);
});

it('accepts a custom icon and colour', function (): void {
    $this->blade('<x-sat::empty-state icon="user" color="green" />')
        ->assertSee('bg-green-100', false)
        ->assertSee('M4.5 20.5c0-4');
});
