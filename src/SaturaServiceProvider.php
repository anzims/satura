<?php

declare(strict_types=1);

namespace Anzims\Satura;

use Anzims\Satura\Console\ThemeCommand;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

/**
 * Точка входа пакета.
 *
 * Регистрирует:
 *  - вьюхи пакета под неймспейсом `satura` (resources/views);
 *  - анонимные Blade-компоненты под префиксом из конфига (по умолчанию `sat`);
 *  - Livewire-неймспейс `satura` для view-based и MFC-компонентов;
 *  - artisan-команду satura:theme.
 */
final class SaturaServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/satura.php', 'satura');

        $this->commands([
            ThemeCommand::class,
        ]);
    }

    public function boot(): void
    {
        $prefix = (string) config('satura.prefix', 'sat');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'satura');

        Blade::anonymousComponentPath(__DIR__.'/../resources/views/components', $prefix);

        Livewire::addNamespace(
            namespace: 'satura',
            viewPath: __DIR__.'/../resources/views/livewire',
            classNamespace: 'Anzims\\Satura\\Livewire',
            classPath: __DIR__.'/Livewire',
            classViewPath: __DIR__.'/../resources/views/livewire',
        );

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/satura.php' => config_path('satura.php'),
            ], 'satura-config');
        }
    }
}
