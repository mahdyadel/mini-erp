<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Product;
use App\Tag;
use App\Observers\ProductObserver;
use App\Observers\TagObserver;

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
        Product::observe(ProductObserver::class);
        Tag::observe(TagObserver::class);
    }
}
