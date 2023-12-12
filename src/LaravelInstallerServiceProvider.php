<?php

namespace PrashantShukla\LaravelInstaller;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use PrashantShukla\LaravelInstaller\Middleware\canInstall;
use PrashantShukla\LaravelInstaller\Middleware\canUpdate;

class LaravelInstallerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(Router $router)
    {

        $router->middlewareGroup('install', [CanInstall::class]);
        $router->middlewareGroup('update', [CanUpdate::class]);
        $this->loadRoutesFrom(__DIR__.'/Routes/web.php');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/Config/installer.php', 'laravel-installer');

        $this->publishFiles();

        // Register the main class to use with the facade
        $this->app->singleton('laravel-installer', function () {
            return new LaravelInstaller;
        });
    }

    protected function publishFiles()
    {
        $this->publishes([
            __DIR__.'/Config/installer.php' => base_path('config/installer.php'),
        ], 'laravel-installer');

        $this->publishes([
            __DIR__.'/Assets' => public_path('installer'),
        ], 'laravel-installer');

        $this->publishes([
            __DIR__.'/Views' => base_path('resources/views/vendor/installer'),
        ], 'laravel-installer');

        $this->publishes([
            __DIR__.'/Lang' => base_path('resources/lang'),
        ], 'laravel-installer');
    }
}
