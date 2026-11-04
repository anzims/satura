<?php

declare(strict_types=1);

it('renders a toast container listening for events', function (): void {
    $this->blade('<x-sat::toast />')
        ->assertSee('x-on:sat-toast.window="push($event.detail)"', false)
        ->assertSee('x-for="item in items"', false)
        ->assertSee('bottom-4 end-4', false)
        ->assertSee('dismiss(item.id)', false);
});

it('supports another corner', function (): void {
    $this->blade('<x-sat::toast position="top-start" />')
        ->assertSee('top-4 start-4', false);
});

it('dispatches a toast from a trigger', function (): void {
    $this->blade('<x-sat::toast.trigger text="Сохранено" color="green" duration="2000"><button>Показать</button></x-sat::toast.trigger>')
        ->assertSee('data-toast-text="Сохранено"', false)
        ->assertSee('data-toast-color="green"', false)
        ->assertSee("new CustomEvent('sat-toast'", false)
        ->assertSee('duration: 2000', false)
        ->assertSee('Показать', false);
});
