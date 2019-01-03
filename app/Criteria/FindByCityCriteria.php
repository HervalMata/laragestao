<?php

namespace GestaoTrocas\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FindByCityCriteria.
 *
 * @package namespace GestaoTrocas\Criteria;
 */
class FindByCityCriteria implements CriteriaInterface
{

    /**
     * FindByCityCriteria constructor.
     * @param $city
     */
    public function __construct($city)
    {
        $this->city = $city;
    }

    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where('city', $this->city);
    }
}
