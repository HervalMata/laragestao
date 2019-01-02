<?php

namespace GestaoTrocas\Providers;

use Illuminate\Support\ServiceProvider;
use GestaoTrocas\Repositories\UnitRepository;
use GestaoTrocas\Repositories\UnitRepositoryEloquent;

class RepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(UnitRepository::class, UnitRepositoryEloquent::class);
        //:end-bindings:
    }
}
