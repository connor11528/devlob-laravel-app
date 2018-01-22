<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\ProductRepository;
use App\Repositories\EloquentProduct;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // EloquentProduct is default implementation of Product Repository
        $this->app->singleton(ProductRepository::class, EloquentProduct::class);
    }
}
