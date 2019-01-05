<?php

namespace GestaoTrocasUser\Http\Controllers;


use GestaoTrocasUnidades\Repositories\UnitRepository;
use GestaoTrocasUser\Http\Requests\UserSettingRequest;
use GestaoTrocasUser\Repositories\UserRepository;
use Jrean\UserVerification\Traits\VerifiesUsers;

class UserSettingsController extends Controller
{
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = \Auth::user();
        return view('modules.gestaotrocasuser.user-settings.settings', compact('user', 'units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserSettingRequest $request)
    {
        $user = \Auth::user();
        $this->repository->update($request->all(), $user->id);
        $request->session()->flash('message', 'Usuário atualizado com sucesso!');
        return redirect()->route('gestaotrocasuser.user-settings.edit');
    }
}
