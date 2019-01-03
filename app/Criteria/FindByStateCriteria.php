<?php

namespace GestaoTrocas\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FindByStateCriteria.
 *
 * @package namespace GestaoTrocas\Criteria;
 */
class FindByStateCriteria implements CriteriaInterface
{

    /**
     * FindByStateCriteria constructor.
     * @param $state
     */
    public function __construct($state)
    {
        $this->state = $state;
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
        return $model->where('state', $this->state);
    }
}
