<?php

declare(strict_types=1);

namespace Codeat3\BladeMajesticIcons;

use BladeUI\Icons\Factory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Container\Container;

final class BladeMajesticIconsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();

        $this->callAfterResolving(Factory::class, function (Factory $factory, Container $container) {
            $config = $container->make('config')->get('blade-majestic-icons', []);

            $factory->add('majestic-icons', array_merge(['path' => __DIR__.'/../resources/svg'], $config));
        });
    }

    private function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/blade-majestic-icons.php', 'blade-majestic-icons');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/svg' => public_path('vendor/blade-majestic-icons'),
            ], 'blade-majestic-icons');

            $this->publishes([
                __DIR__.'/../config/blade-majestic-icons.php' => $this->app->configPath('blade-majestic-icons.php'),
            ], 'blade-majestic-icons-config');
        }
    }
}
