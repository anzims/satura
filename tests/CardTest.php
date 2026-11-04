<?php

declare(strict_types=1);

it('renders a card with title and description', function (): void {
    $this->blade('<x-sat::card title="Отчёт" description="За октябрь">Тело</x-sat::card>')
        ->assertSee('Отчёт', false)
        ->assertSee('За октябрь', false)
        ->assertSee('Тело', false)
        ->assertSee('rounded-ui-lg', false)
        ->assertSee('border-b', false)
        ->assertSee('<h3 class="text-base font-medium">Отчёт</h3>', false)
        ->assertSee('<p class="text-ui-sm text-ui-muted">За октябрь</p>', false);
});

it('gives every section the same symmetric padding', function (): void {
    $html = (string) $this->blade('<x-sat::card title="Шапка">Тело<x-slot:footer><span>Подвал</span></x-slot:footer></x-sat::card>');

    // внешний паддинг карточки
    expect($html)->toContain('py-2');

    // все три секции одинаковые: px-4 py-2, без асимметрии сверху и снизу
    expect(substr_count($html, 'px-4 py-2'))->toBe(3);
    expect($html)->not->toContain('pt-3');
    expect($html)->not->toContain('pb-1.5');
});

it('renders header and footer actions', function (): void {
    $this->blade('<x-sat::card title="Заявка"><x-slot:headerActions><button>Изменить</button></x-slot:headerActions>Тело<x-slot:footer><span>Итого</span></x-slot:footer><x-slot:footerActions><button>Отправить</button></x-slot:footerActions></x-sat::card>')
        ->assertSee('Изменить', false)
        ->assertSee('Отправить', false)
        ->assertSee('Итого', false)
        ->assertSee('border-t', false)
        ->assertSee('justify-between', false);
});

it('replaces the standard header with a custom composition', function (): void {
    $this->blade('<x-sat::card title="Не показывать" padding="none"><x-slot:header><span>Свой заголовок</span></x-slot:header>Тело</x-sat::card>')
        ->assertSee('Свой заголовок', false)
        ->assertDontSee('Не показывать', false)
        ->assertSee('min-w-0 flex-1', false);
});

it('has xs and sm size variants', function (): void {
    $this->blade('<x-sat::card size="xs" title="Крошка" description="Подпись">Тело</x-sat::card>')
        ->assertSee('px-2 py-1', false)
        ->assertSee('<h3 class="text-ui-xs font-medium">Крошка</h3>', false)
        ->assertSee('<p class="text-ui-2xs text-ui-muted">Подпись</p>', false);

    $this->blade('<x-sat::card size="sm" title="Компакт">Тело</x-sat::card>')
        ->assertSee('px-3 py-1.5', false)
        ->assertSee('<h3 class="text-ui-sm font-medium">Компакт</h3>', false);
});

it('keeps md defaults when no size is given', function (): void {
    $this->blade('<x-sat::card title="Обычная">Тело</x-sat::card>')
        ->assertSee('px-4 py-2', false)
        ->assertSee('<h3 class="text-base font-medium">Обычная</h3>', false)
        ->assertSee('gap-1', false);
});

it('applies the lg padding', function (): void {
    $this->blade('<x-sat::card padding="lg" title="Большая">Тело</x-sat::card>')
        ->assertSee('px-6 py-2.5', false);
});
