<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(\App\Contracts\HomeRepositoryInterface::class, \App\Repositories\HomeRepository::class);
        $this->app->bind(\App\Contracts\BlogRepositoryInterface::class, \App\Repositories\BlogRepository::class);
        $this->app->bind(\App\Contracts\FinanceToolsRepositoryInterface::class, \App\Repositories\FinanceToolsRepository::class);
        $this->app->bind(\App\Contracts\HustlesRepositoryInterface::class, \App\Repositories\HustlesRepository::class);
        $this->app->bind(\App\Contracts\ResourcesRepositoryInterface::class, \App\Repositories\ResourcesRepository::class);
    }


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
