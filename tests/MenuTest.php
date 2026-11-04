<?php

declare(strict_types=1);

it('renders menu items with icons, description and marks', function (): void {
    $this->blade('<x-sat::menu>
        <x-sat::menu.group label="Отчёт" />
        <x-sat::menu.item icon="check" checked description="Только с замечаниями">Фильтр</x-sat::menu.item>
        <x-sat::menu.separator />
        <x-sat::menu.item color="red">Удалить</x-sat::menu.item>
    </x-sat::menu>')
        ->assertSee('role="menuitem"', false)
        ->assertSee('Отчёт', false)
        ->assertSee('Только с замечаниями', false)
        ->assertSee('role="separator"', false)
        ->assertSee('text-red-600', false)
        ->assertSee('<svg', false);
});

it('keeps the check mark only when checked', function (): void {
    $unchecked = (string) $this->blade('<x-sat::menu><x-sat::menu.item>Без отметки</x-sat::menu.item></x-sat::menu>');
    $checked = (string) $this->blade('<x-sat::menu><x-sat::menu.item checked>С отметкой</x-sat::menu.item></x-sat::menu>');

    expect(substr_count($unchecked, '<svg'))->toBe(0);
    expect(substr_count($checked, '<svg'))->toBe(1);
});

it('renders links when href is given', function (): void {
    $this->blade('<x-sat::menu><x-sat::menu.item href="/x">Перейти</x-sat::menu.item></x-sat::menu>')
        ->assertSee('href="/x"', false)
        ->assertSee('<a ', false);
});
