<?php
/**
 * Created by PhpStorm.
 * User: Herval
 * Date: 08/01/2019
 * Time: 02:36
 */
namespace GestaoTrocasUser\Providers;

use GestaoTrocasUser\Criteria\FindPermissionsResourceCriteria;
use GestaoTrocasUser\Repositories\PermissionRepository;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        'GestaoTrocas\Model' => 'GestaoTrocas\Policies\ModelPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();

        \Gate::before(function ($user, $ability) {
            if ($user->isAdmin()) {
                return true;
            }
        });

        $permissionRepository = app(PermissionRepository::class);
        $permissionRepository->pushCriteria(new FindPermissionsResourceCriteria());
        $permissions = $permissionRepository->all();
        foreach ($permissions as $p) {
            \Gate::define("{$p->name}/{$p->resource_name}", function ($user) use ($p) {
                return $user->hasRole($p->roles);
            });
        }
    }
}