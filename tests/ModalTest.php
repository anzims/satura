<?php

declare(strict_types=1);

it('renders a native dialog with a trigger', function (): void {
    $this->blade('<x-sat::modal>
        <x-sat::modal.trigger><button>Открыть</button></x-sat::modal.trigger>
        <x-sat::modal.content title="Заголовок" description="Подпись">Тело</x-sat::modal.content>
    </x-sat::modal>')
        ->assertSee('<dialog', false)
        ->assertSee('x-data="{ open: false }"', false)
        ->assertSee('x-on:click="open = true"', false)
        ->assertSee('showModal()', false)
        ->assertSee('Заголовок', false)
        ->assertSee('Подпись', false)
        ->assertSee('Тело', false)
        ->assertSee('data-sat-modal', false)
        ->assertSee('--sat-backdrop-alpha: 0.5', false);
});

it('renders a footer and a close control', function (): void {
    $this->blade('<x-sat::modal><x-sat::modal.content title="Т"><x-slot:footer><button>ОК</button></x-slot:footer>Тело</x-sat::modal.content></x-sat::modal>')
        ->assertSee('ОК', false)
        ->assertSee('aria-label="Закрыть"', false)
        ->assertSee('justify-end', false);
});

it('closes when the dialog emits close', function (): void {
    $html = (string) $this->blade('<x-sat::modal><x-sat::modal.content title="Т">Тело</x-sat::modal.content></x-sat::modal>');

    expect($html)->toContain('x-on:close="open = false"');
    expect($html)->toContain('$event.target === $refs.dialog');
});

it('takes the width from the base modal element', function (): void {
    $html = (string) $this->blade('<x-sat::modal width="2xl"><x-sat::modal.content title="Т">Тело</x-sat::modal.content></x-sat::modal>');

    expect($html)->toContain('--sat-modal-width: 42rem');
    expect($html)->toContain('max-w-[var(--sat-modal-width)]');
});

it('defaults to the lg width', function (): void {
    $html = (string) $this->blade('<x-sat::modal><x-sat::modal.content title="Т">Тело</x-sat::modal.content></x-sat::modal>');

    expect($html)->toContain('--sat-modal-width: 32rem');
});

it('accepts any css length as the width', function (): void {
    $html = (string) $this->blade('<x-sat::modal width="520px"><x-sat::modal.content title="Т">Тело</x-sat::modal.content></x-sat::modal>');
    expect($html)->toContain('--sat-modal-width: 520px');

    $rem = (string) $this->blade('<x-sat::modal width="40rem"><x-sat::modal.content title="Т">Тело</x-sat::modal.content></x-sat::modal>');
    expect($rem)->toContain('--sat-modal-width: 40rem');
});

it('fades the backdrop in and out', function (): void {
    $css = file_get_contents(__DIR__.'/../resources/css/satura.css');

    expect($css)->toContain('[data-sat-modal]::backdrop');
    expect($css)->toContain('[data-sat-modal]:not([open])');
});

it('can turn the dimming off', function (): void {
    $this->blade('<x-sat::modal dim="none"><x-sat::modal.content title="Т">Тело</x-sat::modal.content></x-sat::modal>')
        ->assertSee('--sat-backdrop-alpha: 0', false);
});
