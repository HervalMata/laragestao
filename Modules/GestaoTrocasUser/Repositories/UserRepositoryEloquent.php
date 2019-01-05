<?php

namespace GestaoTrocasUser\Repositories;

use GestaoTrocas\Repositories\BaseRepositoryTrait;
use Jrean\UserVerification\Facades\UserVerification;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use GestaoTrocasUser\Repositories\UserRepository;
use GestaoTrocasUser\Models\User;
use GestaoTrocas\Validators\UserValidator;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace GestaoTrocas\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    use BaseRepositoryTrait;

    public function create(array $attributes)
    {
        $attributes['password'] = User::generatePassword();
        $attributes['enrolment'] = User::generateEnrolment();
        $model = parent::create($attributes);
        UserVerification::generate($model);
        $subject = config('gestaotrocasuser.email.user_created.subject');
        UserVerification::emailView('gestaotrocasuser::email.user-created');
        UserVerification::send($model, $subject);
        return $model;
    }

    public function update(array $attributes, $id)
    {
        $attributes['password'] = User::generatePassword($attributes['password']);
        $attributes = array_except($attributes,  'enrolment');
        return parent::update($attributes, $id);
    }

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name' => 'like',
        'email' => 'like',
        'key' => 'like',
        'unit.name',
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return \GestaoTrocasUser\Models\User::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
