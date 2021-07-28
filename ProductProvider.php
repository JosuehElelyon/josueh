<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Service\Product\ProductSubCategoryService;

use App\Interfaces\Product\ProductSubCategoryServiceInterface;


class ProductProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductSubCategoryServiceInterface::class, ProductSubCategoryService::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}