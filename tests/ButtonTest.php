<?php

declare(strict_types=1);
use Anzims\Satura\Support\Sizes;

it('renders the accent solid button by default', function (): void {
    $this->blade('<x-sat::button>Save</x-sat::button>')
        ->assertSee('Save', false)
        ->assertSee('bg-ui-accent', false)
        ->assertSee('h-10', false)
        ->assertSee('px-4', false);
});

it('supports the eight size steps', function (string $size, string $height): void {
    $this->blade('<x-sat::button size="'.$size.'">S</x-sat::button>')
        ->assertSee($height, false);
})->with([
    ['3xs', 'h-5'],
    ['2xs', 'h-6'],
    ['xs', 'h-7'],
    ['sm', 'h-8'],
    ['md', 'h-10'],
    ['lg', 'h-11'],
    ['xl', 'h-12'],
    ['2xl', 'h-14'],
    ['3xl', 'h-16'],
]);

it('renders tailwind colour variants', function (): void {
    $this->blade('<x-sat::button color="red">R</x-sat::button>')
        ->assertSee('bg-red-600', false);

    $this->blade('<x-sat::button color="green" variant="soft">G</x-sat::button>')
        ->assertSee('bg-green-100', false);

    $this->blade('<x-sat::button color="blue" variant="outline">B</x-sat::button>')
        ->assertSee('border-blue-300', false);

    $this->blade('<x-sat::button color="violet" variant="ghost">V</x-sat::button>')
        ->assertSee('text-violet-700', false);
});

it('renders accent variants', function (): void {
    $this->blade('<x-sat::button variant="soft">A</x-sat::button>')
        ->assertSee('bg-ui-accent/15', false);

    $this->blade('<x-sat::button variant="outline">B</x-sat::button>')
        ->assertSee('border-ui-accent/40', false);

    $this->blade('<x-sat::button variant="ghost">C</x-sat::button>')
        ->assertSee('text-ui-accent', false);
});

it('renders a link button without padding', function (): void {
    $this->blade('<x-sat::button variant="link">Link</x-sat::button>')
        ->assertSee('underline', false)
        ->assertSee('px-0', false);
});

it('renders a loading button with spinner and disabled state', function (): void {
    $this->blade('<x-sat::button loading>Wait</x-sat::button>')
        ->assertSee('aria-busy="true"', false)
        ->assertSee('disabled', false)
        ->assertSee('animate-spin', false);
});

it('merges extra classes and attributes on the button', function (): void {
    $this->blade('<x-sat::button class="mt-4" type="submit" data-test="x">S</x-sat::button>')
        ->assertSee('mt-4', false)
        ->assertSee('type="submit"', false)
        ->assertSee('data-test="x"', false);
});

it('renders a tinted colour variant', function (): void {
    $this->blade('<x-sat::button color="red" variant="tint">T</x-sat::button>')
        ->assertSee('bg-red-50', false)
        ->assertSee('text-red-700', false)
        ->assertSee('border-red-200', false)
        ->assertSee('dark:bg-red-950/60', false);
});

it('exposes the nine size steps', function (): void {
    expect(Sizes::STEPS)->toHaveCount(9);
});

it('scales the corner radius with the control height', function (string $size, string $radius): void {
    $this->blade('<x-sat::button size="'.$size.'">R</x-sat::button>')
        ->assertSee($radius, false);
})->with([
    ['3xs', 'rounded-[5px]'],
    ['2xs', 'rounded-[6px]'],
    ['xs', 'rounded-[7px]'],
    ['sm', 'rounded-ui-md'],
    ['md', 'rounded-[10px]'],
    ['lg', 'rounded-[11px]'],
    ['xl', 'rounded-[12px]'],
    ['2xl', 'rounded-[14px]'],
    ['3xl', 'rounded-[16px]'],
]);

it('gives the outline variant a visible hover on tinted backgrounds', function (): void {
    $this->blade('<x-sat::button color="amber" variant="outline">Продлить</x-sat::button>')
        ->assertSee('hover:bg-amber-100', false);
});
