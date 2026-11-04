<?php

declare(strict_types=1);

it('renders an alert with a default icon and status role', function (): void {
    $this->blade('<x-sat::alert>Сохранили</x-sat::alert>')
        ->assertSee('role="status"', false)
        ->assertSee('Сохранили', false)
        ->assertSee('bg-ui-accent/15', false)
        ->assertSee('<svg', false);
});

it('picks an icon for the colour', function (): void {
    $danger = (string) $this->blade('<x-sat::alert color="red">Ошибка</x-sat::alert>');
    $success = (string) $this->blade('<x-sat::alert color="green">Готово</x-sat::alert>');

    // у опасности треугольник с восклицанием, у успеха галочка
    expect($danger)->toContain('M12 4l9 16H3z');
    expect($success)->toContain('M4.5 12.5l5 5 10-11');
});

it('allows a custom icon, title and actions', function (): void {
    $this->blade('<x-sat::alert color="amber" icon="alert" title="Внимание" role="alert"><x-slot:actions><button>Понятно</button></x-slot:actions>Проверьте даты</x-sat::alert>')
        ->assertSee('role="alert"', false)
        ->assertSee('Внимание', false)
        ->assertSee('Проверьте даты', false)
        ->assertSee('Понятно', false);
});

it('supports solid and outline variants', function (): void {
    $this->blade('<x-sat::alert color="green" variant="solid">Тело</x-sat::alert>')
        ->assertSee('bg-green-600', false)
        ->assertSee('border-transparent', false);

    $this->blade('<x-sat::alert color="blue" variant="outline">Тело</x-sat::alert>')
        ->assertSee('border-blue-300', false);
});
