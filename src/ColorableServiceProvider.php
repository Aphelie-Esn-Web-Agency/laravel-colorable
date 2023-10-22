<?php

namespace Aphelie\Colorable;

use Illuminate\Support\ServiceProvider;

class ColorableServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /*
         * Bind Facade
         */
        $this->app->bind('colorable', function($app) {
            return new Colorable();
        });

        // Bind config file
        $this->mergeConfigFrom(__DIR__.'/config/config.php', 'colorable');

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        /*
         * Copy the config file in laravel  parent project
         * php artisan vendor:publish --provider="Aphelie\Colorable\ColorableServiceProvider" --tag="config"
         */
        if ($this->app->runningInConsole()) {
            $path = realpath(__DIR__.'config/config.php');
            $this->publishes([$path => config_path('colorable.php'), ], 'config');


            $files = array_diff(scandir(__DIR__. 'database/migrations'), array('..', '.'));

            foreach($files as $file){
                $this->publishes([
                    __DIR__ . 'database/migrations/'.$file => database_path('migrations/' . date('Y_m_d_His', time()) . '_' . basename($file, '.stub')),
                    // you can add any number of migrations here
                ], 'migrations');
            }

        }

    }
}
