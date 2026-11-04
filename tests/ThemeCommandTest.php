<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Artisan;

it('prints theme css to the console', function (): void {
    $exit = Artisan::call('satura:theme', ['--base' => 'stone', '--accent' => 'violet']);

    expect($exit)->toBe(0)
        ->and(Artisan::output())
        ->toContain('--ui-base-50')
        ->toContain('--ui-accent-500');
});

it('fails on an unknown palette', function (): void {
    $exit = Artisan::call('satura:theme', ['--base' => 'nope']);

    expect($exit)->toBe(1)
        ->and(Artisan::output())->toContain('Unknown palette');
});

it('writes css to the given file', function (): void {
    $relative = 'storage/framework/testing/satura-theme.css';
    $path = base_path($relative);

    if (! is_dir(dirname($path))) {
        mkdir(dirname($path), 0777, true);
    }

    $this->artisan('satura:theme', ['--base' => 'stone', '--accent' => 'violet', '--out' => $relative])
        ->assertSuccessful();

    expect(file_get_contents($path))
        ->toContain('--ui-base-900')
        ->toContain('--ui-accent-600');

    unlink($path);
});
