<?php

declare(strict_types=1);

it('renders a palette and a colour field', function (): void {
    $this->blade('<x-sat::color-picker value="#16a34a" />')
        ->assertSee("x-data=\"{ color: '#16a34a' }\"", false)
        ->assertSee('type="color"', false)
        ->assertSee('style="background-color: #dc2626"', false)
        ->assertSee('type="text"', false)
        ->assertSee('role="group"', false);
});

it('accepts a custom palette and a form name', function (): void {
    $this->blade('<x-sat::color-picker name="accent" :palette="[\'#000000\', \'#ffffff\']" value="#ffffff" />')
        ->assertSee('name="accent"', false)
        ->assertSee(':value="color"', false)
        ->assertSee('#ffffff', false)
        ->assertSee('#000000', false);
});
