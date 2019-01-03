<?php

namespace GestaoTrocas\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FindBySectorCriteria.
 *
 * @package namespace GestaoTrocas\Criteria;
 */
class FindBySectorCriteria implements CriteriaInterface
{
    /**
     * FindBySectorCriteria constructor.
     * @param $sector
     */
    public function __construct($sector)
    {
        $this->sector = $sector;
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
        return $model->where('sector', $this->sector);
    }
}
