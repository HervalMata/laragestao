<?php

namespace GestaoTrocas\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FindByNameCriteria.
 *
 * @package namespace GestaoTrocas\Criteria;
 */
class FindByNameCriteria implements CriteriaInterface
{
    /**
     * @var
     */
    private $name;

    /**
     * FindByNameCriteria constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
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
        return $model->where('name', 'LIKE'. "%{$this->name}%");
    }
}
