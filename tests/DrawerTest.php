<?php

declare(strict_types=1);

it('renders a drawer dialog anchored to the right', function (): void {
    $this->blade('<x-sat::drawer>
        <x-sat::drawer.trigger><button>Открыть</button></x-sat::drawer.trigger>
        <x-sat::drawer.content title="Фильтры">Тело</x-sat::drawer.content>
    </x-sat::drawer>')
        ->assertSee('<dialog', false)
        ->assertSee('x-on:click="open = true"', false)
        ->assertSee('showModal()', false)
        ->assertSee('--sat-drawer-width: 26rem', false)
        ->assertSee('--sat-drawer-end: 0', false)
        ->assertSee('w-[var(--sat-drawer-width)]', false)
        ->assertSee('Фильтры', false);
});

it('supports left placement and exact widths', function (): void {
    $this->blade('<x-sat::drawer placement="left" width="420px"><x-sat::drawer.content title="Меню">Тело</x-sat::drawer.content></x-sat::drawer>')
        ->assertSee('--sat-drawer-start: 0', false)
        ->assertSee('--sat-drawer-width: 420px', false);
});

it('renders a footer', function (): void {
    $this->blade('<x-sat::drawer><x-sat::drawer.content title="Т"><x-slot:footer><button>ОК</button></x-slot:footer>Тело</x-sat::drawer.content></x-sat::drawer>')
        ->assertSee('ОК', false)
        ->assertSee('justify-end', false);
});

it('animates in from the anchored edge', function (): void {
    $this->blade('<x-sat::drawer><x-sat::drawer.content title="Т">Тело</x-sat::drawer.content></x-sat::drawer>')
        ->assertSee('data-sat-drawer', false)
        ->assertSee('--sat-drawer-from: 100%', false);

    $this->blade('<x-sat::drawer placement="left"><x-sat::drawer.content title="Т">Тело</x-sat::drawer.content></x-sat::drawer>')
        ->assertSee('--sat-drawer-from: -100%', false);
});

it('animates the panel out on close as well', function (): void {
    $css = file_get_contents(__DIR__.'/../resources/css/satura.css');

    expect($css)->toContain('[data-sat-drawer]:not([open])');
    expect($css)->toContain('allow-discrete');
});

it('controls the backdrop dimming', function (): void {
    $this->blade('<x-sat::drawer dim="sm"><x-sat::drawer.content title="Т">Тело</x-sat::drawer.content></x-sat::drawer>')
        ->assertSee('--sat-backdrop-alpha: 0.25', false);
});
