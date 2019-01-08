<?php

namespace GestaoTrocasUser\Http\Controllers;

use GestaoTrocasUser\Http\Controllers\Controller;
use GestaoTrocasUser\Http\Requests\UserDeleteRequest;
use GestaoTrocasUser\Http\Requests\UserRequest;
use GestaoTrocasUnidades\Models\Unit;
use GestaoTrocasUnidades\Repositories\UnitRepository;
use GestaoTrocasUser\Repositories\RoleRepository;
use GestaoTrocasUser\Repositories\UserRepository;
use Illuminate\Http\Request;
use GestaoTrocasUser\Annotations\Mapping as Permission;

/**
 * @Permission\Controller(name="users-admin", description="Administração de usuários")
 * @package GestaoTrocasUser\Http\Controllers
 */
class UsersController extends Controller
{
    /**
     * @var UserRepository
     */
    private $repository;
    /**
     * @var UnitRepository
     */
    private $unitRepository;
    /**
     * @var RoleRepository
     */
    private $roleRepository;

    public function __construct(UserRepository $repository, UnitRepository $unitRepository, RoleRepository $roleRepository)
    {
        $this->repository = $repository;
        $this->unitRepository = $unitRepository;
        $this->roleRepository = $roleRepository;
    }

    /**
     * Display a listing of the resource.
     * @Permission\Action(name="list", description="Ver a listagem de usuários")
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search = $request->get('search');
        $users = $this->repository->paginate(10);
        return view('modules.gestaotrocasuser.users.index', compact('users', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     * @Permission\Action(name="store", description="Cadastrar usuários")
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = $this->unitRepository->lists('name', 'id');
        $roles = $this->roleRepository->lists('name', 'id');
        return view('modules.gestaotrocasuser.users.create', compact(['units', 'roles']));
    }

    /**
     * Store a newly created resource in storage.
     * @Permission\Action(name="store", description="Cadastrar usuários")
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $this->repository->create($request->all());
        $url = $request->get('redirect_to', route('gestaotrocasuser.users.index'));
        $request->session()->flash('message', 'Usuário cadastrado com sucesso!');
        return redirect()->to($url);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @Permission\Action(name="update", description="Atualizar usuários")
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->repository->find($id);
        //$this->unitRepository->withTrashed();
        //$units = $this->unitRepository->lists('name_trashed', 'id');
        $units = $this->unitRepository->lists('name', 'id');
        $roles = $this->roleRepository->lists('name', 'id');
        return view('modules.gestaotrocasuser.users.edit', compact('user', 'units', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     * @Permission\Action(name="update", description="Atualizar usuários")
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $this->repository->update($request->all(), $id);
        $url = $request->get('redirectTo', route('gestaotrocasuser.users.index'));
        $request->session()->flash('message', 'Usuário atualizado com sucesso!');
        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     * @Permission\Action(name="destroy", description="Excluir usuários")
     * @param UserDeleteRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDeleteRequest $request, $id)
    {
        $this->repository->delete($id);
        \Session::flash('message', 'Usuário removido com sucesso!');
        return redirect()->to(\URL::previous());
    }
}
