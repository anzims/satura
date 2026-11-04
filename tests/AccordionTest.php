<?php

declare(strict_types=1);

it('renders native details with a summary', function (): void {
    $this->blade('<x-sat::accordion><x-sat::accordion.item title="Первый">Тело</x-sat::accordion.item></x-sat::accordion>')
        ->assertSee('<details', false)
        ->assertSee('<summary', false)
        ->assertSee('Первый', false)
        ->assertSee('Тело', false)
        ->assertSee('[&::-webkit-details-marker]:hidden', false);
});

it('opens by default and accepts a shared name', function (): void {
    $this->blade('<x-sat::accordion><x-sat::accordion.item title="А" open name="demo">1</x-sat::accordion.item></x-sat::accordion>')
        ->assertSee('open', false)
        ->assertSee('name="demo"', false);
});

it('keeps items closed unless asked', function (): void {
    $html = (string) $this->blade('<x-sat::accordion><x-sat::accordion.item title="Б">2</x-sat::accordion.item></x-sat::accordion>');

    expect($html)->not->toContain(' open');
});

it('replaces the title with a composed header', function (): void {
    $this->blade('<x-sat::accordion><x-sat::accordion.item title="Не показывать"><x-slot:header><span>Свой заголовок</span><span>и подпись</span></x-slot:header>Тело</x-sat::accordion.item></x-sat::accordion>')
        ->assertSee('Свой заголовок', false)
        ->assertSee('и подпись', false)
        ->assertDontSee('Не показывать', false)
        ->assertSee('min-w-0 flex-1', false);
});

it('keeps the chevron after header actions', function (): void {
    $html = (string) $this->blade('<x-sat::accordion><x-sat::accordion.item title="А"><x-slot:headerActions><span>3</span></x-slot:headerActions>Тело</x-sat::accordion.item></x-sat::accordion>');

    expect($html)->toContain('event.stopPropagation()');
    expect(strpos($html, '>3<'))->toBeLessThan(strpos($html, 'group-open:rotate-180'));
});
