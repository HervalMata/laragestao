<?php
/**
 * Created by PhpStorm.
 * User: Herval
 * Date: 07/01/2019
 * Time: 11:54
 */

namespace GestaoTrocasUser\Criteria;


use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class FindPermissionsResourceCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param                     $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->whereNotNull('resource_name');
    }
}