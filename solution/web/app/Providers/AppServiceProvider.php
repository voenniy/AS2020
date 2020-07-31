<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Auth::provider('my-eloquent', function ($app, $config) {
            return new MyEloquentUserProvider($app['hash'], $config['model']);
        });
    }
}
