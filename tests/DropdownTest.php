<?php

declare(strict_types=1);

it('renders a dropdown with a trigger and content', function (): void {
    $this->blade('<x-sat::dropdown>
        <x-sat::dropdown.trigger>Действия</x-sat::dropdown.trigger>
        <x-sat::dropdown.content>
            <x-sat::dropdown.item>Редактировать</x-sat::dropdown.item>
        </x-sat::dropdown.content>
    </x-sat::dropdown>')
        ->assertSee('x-data="{ open: false }"', false)
        ->assertSee(":aria-expanded=\"open ? 'true' : 'false'\"", false)
        ->assertSee('x-show="open"', false)
        ->assertSee('x-cloak', false)
        ->assertSee('Действия', false)
        ->assertSee('Редактировать', false);
});

it('wraps the trigger instead of nesting a button', function (): void {
    $html = (string) $this->blade('<x-sat::dropdown><x-sat::dropdown.trigger><button>Меню</button></x-sat::dropdown.trigger><x-sat::dropdown.content>Пункт</x-sat::dropdown.content></x-sat::dropdown>');

    expect($html)->toContain('x-on:click="open = !open"');
    expect(substr_count($html, '<button'))->toBe(1);
});

it('supports links, buttons and separators', function (): void {
    $this->blade('<x-sat::dropdown>
        <x-sat::dropdown.trigger>Меню</x-sat::dropdown.trigger>
        <x-sat::dropdown.content align="end" width="w-56">
            <x-sat::dropdown.item href="/edit">Изменить</x-sat::dropdown.item>
            <x-sat::dropdown.separator />
            <x-sat::dropdown.item>Удалить</x-sat::dropdown.item>
        </x-sat::dropdown.content>
    </x-sat::dropdown>')
        ->assertSee('role="menuitem"', false)
        ->assertSee('href="/edit"', false)
        ->assertSee('role="separator"', false)
        ->assertSee('end-0', false)
        ->assertSee('w-56', false);
});

it('closes on click outside and escape', function (): void {
    $html = (string) $this->blade('<x-sat::dropdown><x-sat::dropdown.trigger>Т</x-sat::dropdown.trigger><x-sat::dropdown.content>К</x-sat::dropdown.content></x-sat::dropdown>');

    expect($html)->toContain('x-on:click.outside="open = false"');
    expect($html)->toContain('x-on:keydown.escape.window="open = false"');
});

it('shows an optional description under the label', function (): void {
    $this->blade('<x-sat::dropdown><x-sat::dropdown.trigger>М</x-sat::dropdown.trigger><x-sat::dropdown.content><x-sat::dropdown.item description="раз в неделю">Отправить на почту</x-sat::dropdown.item></x-sat::dropdown.content></x-sat::dropdown>')
        ->assertSee('раз в неделю', false)
        ->assertSee('grid gap-0.5', false);
});

it('colours an item in both themes', function (): void {
    $this->blade('<x-sat::dropdown><x-sat::dropdown.trigger>М</x-sat::dropdown.trigger><x-sat::dropdown.content><x-sat::dropdown.item color="red">Удалить</x-sat::dropdown.item></x-sat::dropdown.content></x-sat::dropdown>')
        ->assertSee('text-red-600', false)
        ->assertSee('dark:text-red-500', false);
});
