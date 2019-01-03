<?php

namespace GestaoTrocas\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use GestaoTrocas\Repositories\UnitRepository;
use GestaoTrocas\Models\Unit;
use GestaoTrocas\Validators\UnitValidator;

/**
 * Class UnitRepositoryEloquent.
 *
 * @package namespace GestaoTrocas\Repositories;
 */
class UnitRepositoryEloquent extends BaseRepository implements UnitRepository
{
    use BaseRepositoryTrait;
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
    
}
