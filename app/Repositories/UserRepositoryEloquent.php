<?php

namespace GestaoTrocas\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use GestaoTrocas\Repositories\UserRepository;
use GestaoTrocas\Models\User;
use GestaoTrocas\Validators\UnitValidator;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace GestaoTrocas\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    use BaseRepositoryTrait;

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name' => 'like',
        'email' => 'like',
        'key' => 'like',
        'unit_id' => 'like',
    ];

    public function create(array $attributes)
    {
        $model = parent::create($attributes);
        $model->units()->sinc($attributes['units']);
        return $model;
    }

    public function update(array $attributes, $id)
    {
        $model = parent::update($attributes, $id);
        $model->units()->sinc($attributes['units']);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
