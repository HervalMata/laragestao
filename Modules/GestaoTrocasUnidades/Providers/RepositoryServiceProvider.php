<?php

namespace GestaoTrocasUnidades\Providers;

use Illuminate\Support\ServiceProvider;
use GestaoTrocasUnidades\Repositories\UnitRepository;
use GestaoTrocasUnidades\Repositories\UnitRepositoryEloquent;

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
