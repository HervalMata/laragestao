<?php

namespace GestaoTrocasUser\Providers;

use Illuminate\Support\ServiceProvider;
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
        $this->app->bind(UserRepository::class, UserRepositoryEloquent::class);
        //:end-bindings:
    }
}
