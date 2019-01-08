<?php
/**
 * Created by PhpStorm.
 * User: Herval
 * Date: 08/01/2019
 * Time: 02:22
 */

namespace GestaoTrocasUser\Facade;

use Illuminate\Support\Facades\Facade;
use GestaoTrocasUser\Annotations\PermissionReader as PermissionReaderService;

class PermissionReader extends Facade
{
    public static function getFacadeAccessor()
    {
        return PermissionReaderService::class;
    }
}