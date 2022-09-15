<?php

namespace Shohid\LaravelAdmin;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class LaravelAdminServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerResources();
        $this->registerMigrations();
        $this->registerPublishing();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->configure();
    }

    /**
     * Setup the configuration for laraveladmin.
     *
     * @return void
     */
    protected function configure()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/laraveladmin.php', 'laraveladmin'
        );
    }   

    /**
     * Register the package resources.
     *
     * @return void
     */
    protected function registerResources()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laraveladmin');
    }

    /**
     * Register the package migrations.
     *
     * @return void
     */
    protected function registerMigrations()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        }
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../laraveladmin/laraveladmin.php' => $this->app->configPath('laraveladmin.php'),
            ], 'laraveladmin-config');

            $this->publishes([
                __DIR__.'/../database/migrations' => $this->app->databasePath('migrations'),
            ], 'laraveladmin-migrations');

            $this->publishes([
                __DIR__.'/../resources/views' => $this->app->resourcePath('views/vendor/laraveladmin'),
            ], 'laraveladmin-views');
        }
    }
}