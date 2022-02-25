<?php

namespace Ezhasyafaat\LaravelView;

use Illuminate\Support\ServiceProvider;
use Ezhasyafaat\LaravelView\Console\Command\ViewMakeCommand;

class LaravelViewServiceProvider extends ServiceProvider
{

    public const CONFIG_PATH = __DIR__ . '/../config/laravel-view.php';
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            self::CONFIG_PATH => config_path('laravel-view.php'),
        ], 'config');

        if($this->app->runningInConsole()) {
            $this->commands([
                ViewMakeCommand::class,
            ]);
        }
    }


    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /** */
    }
}
