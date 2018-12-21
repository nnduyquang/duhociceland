<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CategoryItemServiceProvider extends ServiceProvider
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
            \App\Repositories\Backend\CategoryItem\CategoryItemRepositoryInterface::class,
            \App\Repositories\Backend\CategoryItem\CategoryItemRepository::class
        );
    }
}
