<?php

declare(strict_types=1);

it('renders a tooltip around the slot', function (): void {
    $this->blade('<x-sat::tooltip text="Подсказка"><button>Кнопка</button></x-sat::tooltip>')
        ->assertSee('role="tooltip"', false)
        ->assertSee('x-teleport="body"', false)
        ->assertSee('Подсказка', false)
        ->assertSee('<button>Кнопка</button>', false);
});

it('places the bubble on the requested side', function (): void {
    $this->blade('<x-sat::tooltip text="Слева" placement="left">Т</x-sat::tooltip>')
        ->assertSee("side: 'left'", false)
        ->assertSee("align: 'center'", false);

    $this->blade('<x-sat::tooltip text="Снизу" placement="bottom-start">Т</x-sat::tooltip>')
        ->assertSee("side: 'bottom'", false)
        ->assertSee("align: 'start'", false);
});

it('meets the corner of the trigger diagonally', function (): void {
    $this->blade('<x-sat::tooltip text="A" placement="top-left">Т</x-sat::tooltip>')
        ->assertSee("align: 'corner'", false)
        ->assertSee("corner: 'left'", false)
        ->assertSee('trigger.left - tip.width', false);

    $this->blade('<x-sat::tooltip text="B" placement="bottom-right">Т</x-sat::tooltip>')
        ->assertSee("corner: 'right'", false)
        ->assertSee('trigger.right', false);
});

it('keeps the bubble inside the viewport', function (): void {
    $html = (string) $this->blade('<x-sat::tooltip text="A">Т</x-sat::tooltip>');

    expect($html)->toContain('Math.min(Math.max(margin, top), window.innerHeight - tip.height - margin)');
    expect($html)->toContain('Math.min(Math.max(margin, left), window.innerWidth - tip.width - margin)');
});

it('waits before showing', function (): void {
    $html = (string) $this->blade('<x-sat::tooltip text="A" :delay="250">Т</x-sat::tooltip>');

    expect($html)->toContain('}, 250)');
    expect($html)->toContain('clearTimeout(this.timer)');
});

it('can draw an arrow', function (): void {
    $html = (string) $this->blade('<x-sat::tooltip text="A" arrow placement="bottom">Т</x-sat::tooltip>');

    expect($html)->toContain('rotate-45');
    expect($html)->toContain('bottom-full left-1/2');
});

it('can remove the gap so corners touch', function (): void {
    $html = (string) $this->blade('<x-sat::tooltip text="A" offset="none">Т</x-sat::tooltip>');

    expect($html)->toContain('gap: 0');
});
