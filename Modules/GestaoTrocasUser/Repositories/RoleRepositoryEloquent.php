<?php

namespace GestaoTrocasUser\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use GestaoTrocasUser\Models\Role;
use GestaoTrocas\Validators\UserValidator;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace GestaoTrocasUser\Repositories;
 */
class RoleRepositoryEloquent extends BaseRepository implements RoleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Role::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function update(array $attributes, $id)
    {
        $model = parent::update($attributes, $id);
        if (isset($attributes['permissions'])) {
            $model->permissions()->sync($attributes['permissions']);
        }
        return $model;
    }

    public function updatePermission(array $data, $id)
    {
        $role = $this->find($id);
        $role->permissions()->detach();
        if (count($data)) {
            $role->permissions()->sync($data);
        }
        return $role;
    }
}
