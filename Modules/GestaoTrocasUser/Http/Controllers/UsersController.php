<?php

namespace GestaoTrocasUser\Http\Controllers;

use GestaoTrocasUser\Http\Controllers\Controller;
use GestaoTrocasUser\Http\Requests\UserRequest;
use GestaoTrocasUnidades\Models\Unit;
use GestaoTrocasUnidades\Repositories\UnitRepository;
use GestaoTrocasUser\Repositories\UserRepository;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * @var UserRepository
     */
    private $repository;
    private $unitRepository;

    public function __construct(UserRepository $repository, UnitRepository $unitRepository)
    {
        $this->repository = $repository;
        $this->unitRepository = $unitRepository;
    }

    /**
     * Display a listing of the resource.
     *
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
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = $this->unitRepository->lists('name', 'id');
        return view('modules.gestaotrocasuser.users.create', compact('units'));
    }

    /**
     * Store a newly created resource in storage.
     *
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->repository->find($id);
        //$this->unitRepository->withTrashed();
        //$units = $this->unitRepository->lists('name_trashed', 'id');
        $units = $this->unitRepository->lists('name', 'id');
        return view('modules.gestaotrocasuser.users.edit', compact('user', 'units'));
    }

    /**
     * Update the specified resource in storage.
     *
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);
        \Session::flash('message', 'Usuário removido com sucesso!');
        return redirect()->to(\URL::previous());
    }
}
