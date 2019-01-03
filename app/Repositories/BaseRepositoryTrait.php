<?php
/**
 * Created by PhpStorm.
 * User: Herval
 * Date: 02/01/2019
 * Time: 22:08
 */

namespace GestaoTrocas\Repositories;


trait BaseRepositoryTrait
{
    public function lists($column, $key = null)
    {
        $this->applyCriteria();

        return $this->model->pluck($column, $key);
    }
}