<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Eloquent\ProductRepository;
use App\Repositories\Contracts\MejaRepositoryInterface;
use App\Repositories\Eloquent\MejaRepository;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(MejaRepositoryInterface::class, MejaRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
