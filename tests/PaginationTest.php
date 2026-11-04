<?php

declare(strict_types=1);

it('renders page links and marks the current page', function (): void {
    $html = (string) $this->blade('<x-sat::pagination :current="3" :last="5" />');

    expect($html)->toContain('aria-label="Пагинация"');
    expect($html)->toContain('aria-current="page"');
    expect($html)->toContain('rel="prev"');
    expect($html)->toContain('rel="next"');
    expect($html)->toContain('page=4');
});

it('disables the arrows on the edges', function (): void {
    $first = (string) $this->blade('<x-sat::pagination :current="1" :last="5" />');
    $lastPage = (string) $this->blade('<x-sat::pagination :current="5" :last="5" />');

    expect($first)->not->toContain('rel="prev"');
    expect($first)->toContain('aria-disabled="true"');

    expect($lastPage)->not->toContain('rel="next"');
});

it('collapses long ranges', function (): void {
    $html = (string) $this->blade('<x-sat::pagination :current="10" :last="20" />');

    expect($html)->toContain('…');
    expect($html)->toContain('page=9');
    expect($html)->toContain('page=11');
});

it('accepts a custom url builder', function (): void {
    $this->blade('<x-sat::pagination :current="2" :last="4" :url="$url" />', [
        'url' => fn (int $page): string => '/list?p='.$page,
    ])->assertSee('href="/list?p=1"', false);
});

it('scales with the size prop', function (): void {
    $this->blade('<x-sat::pagination :current="2" :last="3" size="xs" />')
        ->assertSee('h-6', false);
});

it('has a light plain variant by default', function (): void {
    $html = (string) $this->blade('<x-sat::pagination :current="3" :last="5" />');

    expect($html)->toContain('font-semibold text-ui-fg underline underline-offset-4');
    expect($html)->toContain('text-ui-muted/60 hover:text-ui-fg');
    expect($html)->not->toContain('bg-ui-accent text-ui-accent-fg');
});

it('keeps the boxed variant', function (): void {
    $this->blade('<x-sat::pagination :current="3" :last="5" variant="boxed" />')
        ->assertSee('bg-ui-accent text-ui-accent-fg', false);
});
