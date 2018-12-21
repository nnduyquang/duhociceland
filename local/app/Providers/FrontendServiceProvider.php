<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FrontendServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', 'App\Http\ViewComposers\MenuComposer');
        view()->composer('*', 'App\Http\ViewComposers\FrontendComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(\App\Repositories\Frontend\FrontendRepositoryInterface::class, \App\Repositories\Frontend\FrontendRepository::class);
    }
}
