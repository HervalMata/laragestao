<?php

namespace GestaoTrocasUser\Repositories;

use Prettus\Repository\Contracts\RepositoryCriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface UserRepository.
 *
 * @package namespace GestaoTrocasUser\Repositories;
 */
interface RoleRepository extends RepositoryInterface, RepositoryCriteriaInterface
{
    public function updatePermission(array $data, $id);
}
