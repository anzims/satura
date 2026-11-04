<?php

declare(strict_types=1);

it('renders steps with numbers and a current step', function (): void {
    $this->blade('<x-sat::steps :current="2" :items="[\'Заявка\', \'Проверка\', \'Публикация\']" />')
        ->assertSee('Заявка', false)
        ->assertSee('Проверка', false)
        ->assertSee('Публикация', false)
        ->assertSee('aria-current="step"', false)
        ->assertSee('bg-ui-accent text-ui-accent-fg', false);
});

it('marks finished steps with a check', function (): void {
    $html = (string) $this->blade('<x-sat::steps :current="3" :items="[\'A\', \'B\', \'C\']" />');

    expect(substr_count($html, '<svg'))->toBe(2);
});

it('accepts labels with descriptions and sizes', function (): void {
    $this->blade('<x-sat::steps :current="1" size="lg" :items="[[\'label\' => \'Заявка\', \'description\' => \'до 12:00\']]" />')
        ->assertSee('до 12:00', false)
        ->assertSee('size-10', false);
});

it('keeps the connector visible in the dark theme', function (): void {
    $this->blade('<x-sat::steps :current="1" :items="[\'A\', \'B\']" />')
        ->assertSee('bg-ui-border-strong', false);
});

it('accepts a colour for done and current steps', function (): void {
    $this->blade('<x-sat::steps :current="2" color="green" :items="[\'A\', \'B\', \'C\']" />')
        ->assertSee('bg-green-600', false)
        ->assertSee('border-green-600', false);
});

it('lets every step have its own colour', function (): void {
    $items = [
        ['label' => 'A', 'color' => 'red'],
        ['label' => 'B', 'color' => 'amber'],
        ['label' => 'C', 'color' => 'green'],
    ];

    $html = (string) $this->blade('<x-sat::steps :current="2" :items="$items" />', ['items' => $items]);

    expect($html)->toContain('bg-red-600');
    expect($html)->toContain('border-amber-600');
});
