<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\MovementProduct;
use App\Observers\MovementProductObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register model observers
        MovementProduct::observe(MovementProductObserver::class);
    }
    
}
