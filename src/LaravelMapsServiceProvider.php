<?php

namespace Larswiegers\LaravelMaps;

use Illuminate\Support\ServiceProvider;
use Larswiegers\LaravelMaps\Components\Google;
use Larswiegers\LaravelMaps\Components\Leaflet;

class LaravelMapsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-maps');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-maps');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('laravel-maps.php'),
            ], 'config');

            // Publishing the views.
            $this->publishes([
                __DIR__.'/../resources/views/components' => resource_path('views/vendor/maps/components'),
            ], 'views');

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/laravel-maps'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-maps'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }

        $this->loadViewComponentsAs('maps', [
            Leaflet::class,
            Google::class,
        ]);

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'maps');
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'maps');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravel-maps');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-maps', function () {
            return new LaravelMaps;
        });
    }
}
