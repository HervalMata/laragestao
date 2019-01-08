<?php

namespace GestaoTrocasUser\Http\Controllers;

use GestaoTrocasUser\Criteria\FindPermissionsGroupCriteria;
use GestaoTrocasUser\Http\Controllers\Controller;
use GestaoTrocasUser\Http\Requests\RoleRequest;
use GestaoTrocasUser\Http\Requests\PermissionRequest;
use GestaoTrocasUser\Http\Requests\UserDeleteRequest;
use GestaoTrocasUser\Http\Requests\UserRequest;
use GestaoTrocasUnidades\Models\Unit;
use GestaoTrocasUnidades\Repositories\UnitRepository;
use GestaoTrocasUser\Repositories\PermissionRepository;
use GestaoTrocasUser\Repositories\RoleRepository;
use GestaoTrocasUser\Repositories\UserRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use GestaoTrocasUser\Annotations\Mapping as Permission;

/**
 * @Permission\Controller(name="roles-admin", description="Administração de roles")
 * @package GestaoTrocasUser\Http\Controllers
 */
class RoleController extends Controller
{
    /**
     * @var RoleRepository
     */
    private $repository;
    /**
     * @var PermissionRepository
     */
    private $permissionRepository;

    public function __construct(RoleRepository $repository, PermissionRepository $permissionRepository)
    {
        $this->repository = $repository;
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Display a listing of the resource.
     * @Permission\Action(name="list", description="Ver a listagem de roles")
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = $this->repository->orderBy('name')->paginate(10);
        return view('modules.gestaotrocasuser.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     * @Permission\Action(name="store", description="Cadastrar roles")
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.gestaotrocasuser.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     * @Permission\Action(name="store", description="Cadastrar roles")
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $this->repository->create($request->all());
        $url = $request->get('redirect_to', route('gestaotrocasuser.roles.index'));
        $request->session()->flash('message', 'Role cadastrada com sucesso!');
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
     * @Permission\Action(name="update", description="Atualizar roles")
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = $this->repository->find($id);
        return view('modules.gestaotrocasuser.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     * @Permission\Action(name="update", description="Atualizar roles")
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        $this->repository->update($request->all(), $id);
        $url = $request->get('redirectTo', route('gestaotrocasuser.roles.index'));
        $request->session()->flash('message', 'Role atualizada com sucesso!');
        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     * @Permission\Action(name="destroy", description="Excluir roles")
     * @param UserDeleteRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoleRequest $request, $id)
    {
        try {
            $this->repository->delete($id);
            \Session::flash('message', 'Role removida com sucesso!');
        } catch (QueryException $exception) {
            \Session::flash('error', 'Role não pode ser removida. Ela está relacionada com outros registros.');
        }
        return redirect()->to(\URL::previous());
    }

    public function editPermission($id)
    {
        $role = $this->repository->find($id);
        $this->permissionRepository->pushCriteria(new FindPermissionsResourceCriteria());
        $permissions = $this->permissionRepository->all();

        $this->permissionRepository->resetCriteria(new FindPermissionsGroupCriteria());
        $permissionsGroup = $this->permissionRepository->all();

        return view('', compact('role', 'permissions', 'permissionsGroup'));
    }

    public function updatePermission(PermissionRequest $request, $id)
    {
        $data = $request->get('permissions', []);
        $this->repository->updatePermission($data, $id);
        $url = $request->get('redirec_to', route('gestaotrocasuser.roles.index'));
        $request->session()->flash('message', 'Permissões atribuidas com sucesso!');
        return redirect()->to($url);
    }
}
