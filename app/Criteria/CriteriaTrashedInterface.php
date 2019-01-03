<?php
/**
 * Created by PhpStorm.
 * User: Herval
 * Date: 03/01/2019
 * Time: 13:25
 */

namespace GestaoTrocas\Criteria;


interface CriteriaTrashedInterface
{
    public function onlyTrashed();
    public function withTrashed();
}