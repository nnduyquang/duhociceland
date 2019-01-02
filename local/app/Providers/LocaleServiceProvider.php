<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LocaleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\Backend\Locale\LocaleRepositoryInterface::class,
            \App\Repositories\Backend\Locale\LocaleRepository::class
        );
    }
}
