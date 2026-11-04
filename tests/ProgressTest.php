<?php

declare(strict_types=1);

it('renders a progressbar with values', function (): void {
    $this->blade('<x-sat::progress :value="40" :max="80" label="Загрузка" />')
        ->assertSee('role="progressbar"', false)
        ->assertSee('aria-valuenow="40"', false)
        ->assertSee('aria-valuemax="80"', false)
        ->assertSee('aria-label="Загрузка"', false)
        ->assertSee('width: 50%', false)
        ->assertSee('bg-ui-accent', false);
});

it('clamps out of range values', function (): void {
    $this->blade('<x-sat::progress :value="150" />')->assertSee('width: 100%', false);
    $this->blade('<x-sat::progress :value="-20" />')->assertSee('width: 0%', false);
});

it('shows the rounded percentage', function (): void {
    $this->blade('<x-sat::progress :value="1" :max="3" show-value />')
        ->assertSee('33%', false);
});

it('scales the bar and accepts a colour', function (): void {
    $this->blade('<x-sat::progress :value="10" size="3xl" color="green" />')
        ->assertSee('h-6', false)
        ->assertSee('bg-green-600', false)
        ->assertSee('dark:bg-green-500', false);
});

it('shows the percentage next to the label, not at the far right', function (): void {
    $html = (string) $this->blade('<x-sat::progress :value="45" label="Загрузка" show-value />');

    expect($html)->not->toContain('justify-between');
    expect(strpos($html, 'Загрузка'))->toBeLessThan(strpos($html, '45%'));
    expect(strpos($html, '45%'))->toBeLessThan(strpos($html, 'role="progressbar"'));
});

it('accepts a pixel thickness', function (): void {
    $this->blade('<x-sat::progress :value="30" thickness="3px" />')
        ->assertSee('style="height: 3px"', false)
        ->assertDontSee('h-2.5', false);
});

it('keeps the thinnest step at 2px', function (): void {
    $this->blade('<x-sat::progress :value="10" size="3xs" />')->assertSee('h-0.5', false);
    $this->blade('<x-sat::progress :value="10" size="3xl" />')->assertSee('h-6', false);
});

it('renders a circular progress', function (): void {
    $html = (string) $this->blade('<x-sat::progress :value="40" variant="circle" show-value />');

    expect($html)
        ->toContain('<svg')
        ->toContain('stroke-dashoffset="60"')
        ->toContain('stroke-ui-accent')
        ->toContain('size-12')
        ->toContain('40%');
});

it('accepts circle size, colour and stroke width', function (): void {
    $this->blade('<x-sat::progress :value="10" variant="circle" size="3xl" thickness="6" color="green" />')
        ->assertSee('size-24', false)
        ->assertSee('stroke-width="6"', false)
        ->assertSee('stroke-green-600', false)
        ->assertSee('dark:stroke-green-500', false);
});

it('drops the percent sign on the smallest circles', function (): void {
    $small = (string) $this->blade('<x-sat::progress :value="60" variant="circle" size="3xs" show-value />');
    $large = (string) $this->blade('<x-sat::progress :value="60" variant="circle" size="md" show-value />');

    expect($small)->toContain('60')->not->toContain('60%');
    expect($large)->toContain('60%');
});
