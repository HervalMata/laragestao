<?php

namespace GestaoTrocasUnidades\Repositories;

use GestaoTrocas\Criteria\CriteriaTrashedInterface;
use GestaoTrocas\Repositories\RepositoryRestoreInterface;
use Prettus\Repository\Contracts\RepositoryCriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface UnitRepository.
 *
 * @package namespace GestaoTrocas\Repositories;
 */
interface UnitRepository extends RepositoryInterface, RepositoryCriteriaInterface, CriteriaTrashedInterface, RepositoryRestoreInterface
{
    public function listsWithMutators($column, $key = null);
}
