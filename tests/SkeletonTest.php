<?php

declare(strict_types=1);

it('renders a pulsing block and hides it from screen readers', function (): void {
    $this->blade('<x-sat::skeleton />')
        ->assertSee('animate-pulse', false)
        ->assertSee('bg-ui-skeleton', false)
        ->assertSee('aria-hidden="true"', false)
        ->assertSee('h-10', false);
});

it('supports text and circle shapes', function (): void {
    $this->blade('<x-sat::skeleton shape="text" />')->assertSee('h-3', false);
    $this->blade('<x-sat::skeleton shape="circle" />')->assertSee('rounded-full', false);
});

it('uses a visible token by default and accepts palette colours', function (): void {
    $this->blade('<x-sat::skeleton />')
        ->assertSee('bg-ui-skeleton', false);

    $this->blade('<x-sat::skeleton color="blue" />')
        ->assertSee('bg-blue-100', false)
        ->assertSee('dark:bg-blue-900', false);
});
