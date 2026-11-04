<?php

declare(strict_types=1);

it('opens a menu on right click at the pointer', function (): void {
    $this->blade('<x-sat::context-menu>
        <div>Область</div>

        <x-slot:content>
            <x-sat::menu><x-sat::menu.item>Копировать</x-sat::menu.item></x-sat::menu>
        </x-slot:content>
    </x-sat::context-menu>')
        ->assertSee('x-on:contextmenu.prevent', false)
        ->assertSee('clientX', false)
        ->assertSee('clientY', false)
        ->assertSee('Область', false)
        ->assertSee('Копировать', false)
        ->assertSee('fixed z-50', false)
        ->assertSee('x-on:click.outside', false)
        ->assertSee('x-on:keydown.escape.window', false);
});

it('accepts a custom width', function (): void {
    $this->blade('<x-sat::context-menu width="min-w-64"><div>Зона</div></x-sat::context-menu>')
        ->assertSee('min-w-64', false);
});

it('can open on a left click instead of a right click', function (): void {
    $html = (string) $this->blade('<x-sat::context-menu button="left"><div>Зона</div><x-slot:content><x-sat::menu><x-sat::menu.item>Пункт</x-sat::menu.item></x-sat::menu></x-slot:content></x-sat::context-menu>');

    expect($html)->toContain('x-on:click="open = true');
    expect($html)->not->toContain('x-on:contextmenu.prevent');
    expect($html)->toContain('x-on:click.stop="open = false"');
});

it('keeps the right click by default', function (): void {
    $html = (string) $this->blade('<x-sat::context-menu><div>Зона</div></x-sat::context-menu>');

    expect($html)->toContain('x-on:contextmenu.prevent');
});
