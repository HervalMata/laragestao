<?php

namespace GestaoTrocasUser\Providers;

use GestaoTrocasUser\Repositories\PermissionRepository;
use GestaoTrocasUser\Repositories\PermissionRepositoryEloquent;
use GestaoTrocasUser\Repositories\RoleRepository;
use GestaoTrocasUser\Repositories\RoleRepositoryEloquent;
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
        $this->app->bind(PermissionRepository::class, PermissionRepositoryEloquent::class);
        $this->app->bind(RoleRepository::class, RoleRepositoryEloquent::class);
        //:end-bindings:
    }
}
