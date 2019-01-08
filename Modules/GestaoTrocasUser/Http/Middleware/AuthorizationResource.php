<?php
/**
 * Created by PhpStorm.
 * User: Herval
 * Date: 08/01/2019
 * Time: 02:26
 */

namespace GestaoTrocasUser\Http\Middleware;

use Closure;
use GestaoTrocasUser\Facade\PermissionReader;
use Illuminate\Auth\Access\AuthorizationException;

class AuthorizationResource
{
    /**
     * @param \Request $request
     * @param Closure $next
     */
    public function handle(\Request $request, Closure $next)
    {
        $currentAction = \Route::currentRouteAction();
        list($controller, $action) = explode('@', $currentAction);
        $permission = PermissionReader::getPermission($controller, $action);
        if (count($permission)) {
            $permission = $permission[0];
            if (!\Gate::allows("{$permission['name']}/{$permission['resource_name']}")) {
                throw new AuthorizationException("Usuário não autorizado");
            }
        }
        return $next($request);
    }
}