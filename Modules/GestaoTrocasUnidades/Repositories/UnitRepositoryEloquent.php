<?php

namespace GestaoTrocasUnidades\Repositories;

use GestaoTrocas\Criteria\CriteriaTrashedTrait;
use GestaoTrocas\Repositories\BaseRepositoryTrait;
use GestaoTrocas\Repositories\RepositoryRestoreTrait;
use Illuminate\Support\Collection;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use GestaoTrocasUnidades\Repositories\UnitRepository;
use GestaoTrocasUnidades\Models\Unit;
use GestaoTrocas\Validators\UnitValidator;

/**
 * Class UnitRepositoryEloquent.
 *
 * @package namespace GestaoTrocas\Repositories;
 */
class UnitRepositoryEloquent extends BaseRepository implements UnitRepository
{
    use BaseRepositoryTrait;
    use CriteriaTrashedTrait;
    use RepositoryRestoreTrait;

    protected $fieldSearchable = [
        'name' => 'like',
        'sector' => 'like',
        'state' => 'like',
        'city' => 'like',
    ];



    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Unit::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function listsWithMutators($column, $key = null)
    {
        /** @var Collection $collection */
        $collection = $this->all();
        return $collection->pluck($column, $key);
    }
}
