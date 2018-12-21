<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
//        view()->composer(
//            '*',
//            'App\Http\ViewComposers\MenuComposer'
//        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\Backend\Menu\MenuRepositoryInterface::class,
            \App\Repositories\Backend\Menu\MenuRepository::class
        );
    }
}
