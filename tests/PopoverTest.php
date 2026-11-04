<?php

declare(strict_types=1);

it('renders a popover with a trigger and a panel', function (): void {
    $this->blade('<x-sat::popover>
        <x-sat::popover.trigger><button>Профиль</button></x-sat::popover.trigger>
        <x-sat::popover.content>Содержимое</x-sat::popover.content>
    </x-sat::popover>')
        ->assertSee('x-data="{ open: false }"', false)
        ->assertSee('x-on:click="open = !open"', false)
        ->assertSee('x-show="open"', false)
        ->assertSee('Профиль', false)
        ->assertSee('Содержимое', false)
        ->assertSee('x-on:click.outside', false)
        ->assertSee('x-on:keydown.escape.window', false);
});

it('supports other placements and widths', function (): void {
    $this->blade('<x-sat::popover><x-sat::popover.trigger>Т</x-sat::popover.trigger><x-sat::popover.content placement="top-end" width="w-96">П</x-sat::popover.content></x-sat::popover>')
        ->assertSee('bottom-full end-0', false)
        ->assertSee('w-96', false);
});

it('does not close when clicking inside', function (): void {
    $html = (string) $this->blade('<x-sat::popover><x-sat::popover.trigger>Т</x-sat::popover.trigger><x-sat::popover.content>П</x-sat::popover.content></x-sat::popover>');

    expect($html)->not->toContain('x-on:click.stop="open = false"');
});
