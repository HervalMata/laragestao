<?php

namespace GestaoTrocas\Providers;

use Illuminate\Support\ServiceProvider;
use GestaoTrocasUnidades\Repositories\UnitRepository;
use GestaoTrocasUnidades\Repositories\UnitRepositoryEloquent;
use GestaoTrocasUser\Repositories\UserRepository;
use GestaoTrocasUser\Repositories\UserRepositoryEloquent;

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
        $this->app->bind(UserRepository::class, UserRepositoryEloquent::class);
        //:end-bindings:
    }
}
