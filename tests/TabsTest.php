<?php

declare(strict_types=1);

it('renders triggers and panels with ARIA roles', function (): void {
    $this->blade('<x-sat::tabs default="one">
        <x-slot:triggers>
            <x-sat::tabs.trigger name="one">Первый</x-sat::tabs.trigger>
            <x-sat::tabs.trigger name="two">Второй</x-sat::tabs.trigger>
        </x-slot:triggers>

        <x-sat::tabs.panel name="one">Содержимое один</x-sat::tabs.panel>
        <x-sat::tabs.panel name="two">Содержимое два</x-sat::tabs.panel>
    </x-sat::tabs>')
        ->assertSee('role="tablist"', false)
        ->assertSee('role="tab"', false)
        ->assertSee('role="tabpanel"', false)
        ->assertSee('aria-labelledby="tab-one"', false)
        ->assertSee("active: 'one'", false)
        ->assertSee('x-cloak', false);
});

it('underlines the active trigger without colouring the text', function (): void {
    $this->blade('<x-sat::tabs default="one">
        <x-slot:triggers>
            <x-sat::tabs.trigger name="one" color="green">Первый</x-sat::tabs.trigger>
        </x-slot:triggers>
        <x-sat::tabs.panel name="one">Текст</x-sat::tabs.panel>
    </x-sat::tabs>')
        ->assertSee('border-green-600 dark:border-green-400 text-ui-fg', false)
        ->assertSee('border-transparent text-ui-muted', false);
});

it('colours the text only when asked', function (): void {
    $this->blade('<x-sat::tabs default="one">
        <x-slot:triggers>
            <x-sat::tabs.trigger name="one" color="red" text-color>Первый</x-sat::tabs.trigger>
        </x-slot:triggers>
        <x-sat::tabs.panel name="one">Текст</x-sat::tabs.panel>
    </x-sat::tabs>')
        ->assertSee('border-red-600 dark:border-red-400 text-red-700', false);
});

it('accepts a composed trigger', function (): void {
    $this->blade('<x-sat::tabs default="one">
        <x-slot:triggers>
            <x-sat::tabs.trigger name="one">Первый <span>3</span></x-sat::tabs.trigger>
        </x-slot:triggers>
        <x-sat::tabs.panel name="one">Текст</x-sat::tabs.panel>
    </x-sat::tabs>')
        ->assertSee('<span>3</span>', false);
});
