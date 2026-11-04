<?php

declare(strict_types=1);

it('renders an autocomplete field with options', function (): void {
    $this->blade('<x-sat::autocomplete name="city" label="Город" :options="[\'Москва\', \'Казань\']" placeholder="Начните вводить" />')
        ->assertSee('Город', false)
        ->assertSee('Начните вводить', false)
        ->assertSee('data-options=', false)
        ->assertSee('JSON.parse($el.dataset.options)', false)
        ->assertSee('x-for="(option, index) in matches"', false)
        ->assertSee('name="city"', false)
        ->assertSee(':value="q"', false);
});

it('carries the option list in a data attribute', function (): void {
    $html = (string) $this->blade('<x-sat::autocomplete :options="[\'Москва\']" />');

    expect($html)->toContain('&quot;Москва&quot;');
});

it('can ignore the keyboard layout', function (): void {
    $html = (string) $this->blade('<x-sat::autocomplete layout :options="[\'Москва\']" />');

    expect($html)->toContain('layout: true');
    expect($html)->toContain('data-keyboard=');
    expect($html)->toContain('&quot;f&quot;:&quot;а&quot;');

    $plain = (string) $this->blade('<x-sat::autocomplete :options="[\'Москва\']" />');
    expect($plain)->toContain('layout: false');
});

it('shows the first options for an empty query', function (): void {
    $html = (string) $this->blade('<x-sat::autocomplete :options="[\'Москва\', \'Казань\']" />');

    expect($html)->toContain("if (this.q.trim() === '') {");
    expect($html)->toContain('return this.options.slice(0, this.limit);');
});

it('moves through the list with the keyboard', function (): void {
    $html = (string) $this->blade('<x-sat::autocomplete :options="[\'Москва\']" />');

    expect($html)->toContain('x-on:keydown.down.prevent="move(1)"');
    expect($html)->toContain('x-on:keydown.up.prevent="move(-1)"');
    expect($html)->toContain('x-on:keydown.enter.prevent="choose()"');
    expect($html)->toContain('active === index');
});

it('highlights the active row visibly', function (): void {
    $html = (string) $this->blade('<x-sat::autocomplete :options="[\'Москва\']" />');

    expect($html)->toContain('bg-ui-accent/20 text-ui-accent');
});

it('takes a custom highlight colour', function (): void {
    $this->blade('<x-sat::autocomplete highlight="green" :options="[\'Москва\']" />')
        ->assertSee('bg-green-100 text-green-700', false)
        ->assertSee('dark:bg-green-900', false);
});
