<?php

namespace GestaoTrocasUser\Http\Controllers;


use GestaoTrocasUnidades\Repositories\UnitRepository;
use GestaoTrocasUser\Repositories\UserRepository;
use Jrean\UserVerification\Traits\VerifiesUsers;

class UserConfirmationController extends Controller
{
    use VerifiesUsers;

    /**
     * @var UnitRepository
     */
    private $repository;
    private $unitRepository;

    public function __construct(UserRepository $repository, UnitRepository $unitRepository)
    {
        $this->repository = $repository;
        $this->unitRepository = $unitRepository;
    }

    public function redirectAfterVerification()
    {
        $this->loginUser();
        return route('gestaotrocasuser.user_settings.edit');
    }

    private function loginUser()
    {
        $email = \Request::get('email');
        $user = $this->repository->findByField('email', $email)->first();
        \Auth::login($user);
    }
}
