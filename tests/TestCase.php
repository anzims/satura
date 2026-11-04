<?php

declare(strict_types=1);

namespace Anzims\Satura\Tests;

use Anzims\Satura\SaturaServiceProvider;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            SaturaServiceProvider::class,
            LivewireServiceProvider::class,
        ];
    }
}
