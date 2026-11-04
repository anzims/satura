<?php

declare(strict_types=1);

it('renders links and the current page', function (): void {
    $items = [
        ['label' => 'Главная', 'url' => '/'],
        ['label' => 'Отчёты', 'url' => '/reports'],
        ['label' => 'Октябрь'],
    ];

    $this->blade('<x-sat::breadcrumbs :items="$items" />', ['items' => $items])
        ->assertSee('aria-label="Хлебные крошки"', false)
        ->assertSee('<a href="/"', false)
        ->assertSee('Отчёты', false)
        ->assertSee('aria-current="page"', false)
        ->assertSee('Октябрь', false);
});

it('collapses the middle of a long trail', function (): void {
    $items = [
        ['label' => 'A', 'url' => '/a'],
        ['label' => 'B', 'url' => '/b'],
        ['label' => 'C', 'url' => '/c'],
        ['label' => 'D', 'url' => '/d'],
        ['label' => 'E'],
    ];

    $html = (string) $this->blade('<x-sat::breadcrumbs :items="$items" :collapse="2" />', ['items' => $items]);

    expect($html)->toContain('…');
    expect($html)->not->toContain('>B<');
    expect($html)->not->toContain('>C<');
    expect($html)->toContain('D');
    expect($html)->toContain('E');
});

it('accepts content through the slot', function (): void {
    $this->blade('<x-sat::breadcrumbs><span>Свой вариант</span></x-sat::breadcrumbs>')
        ->assertSee('Свой вариант', false);
});

it('accepts a custom separator and gap', function (): void {
    $items = [
        ['label' => 'Главная', 'url' => '/'],
        ['label' => 'Отчёты'],
    ];

    $html = (string) $this->blade('<x-sat::breadcrumbs :items="$items" separator="/" gap="md" />', ['items' => $items]);

    expect($html)->toContain('>/<');
    expect($html)->not->toContain('<svg');
    expect($html)->toContain('gap-2.5');
});

it('has four size steps', function (): void {
    $items = [['label' => 'Раздел']];

    $this->blade('<x-sat::breadcrumbs :items="$items" size="xs" />', ['items' => $items])
        ->assertSee('text-ui-2xs', false);

    $this->blade('<x-sat::breadcrumbs :items="$items" size="lg" />', ['items' => $items])
        ->assertSee('text-base', false);
});
