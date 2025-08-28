<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
            Paginator::useBootstrapFive(); // for Bootstrap 5

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
