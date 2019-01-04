<?php

namespace GestaoTrocasUnidades\Http\Controllers;

use GestaoTrocas\Http\Controllers\Controller;
use GestaoTrocasUnidades\Http\Requests\UnitRequest;
use GestaoTrocasUnidades\Models\Unit;
use GestaoTrocasUnidades\Repositories\UnitRepository;
use Illuminate\Http\Request;

class UnitsController extends Controller
{
    /**
     * @var UnitRepository
     */
    private $repository;

    public function __construct(UnitRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $units = $this->repository->paginate(10);
        return view('modules.gestaotrocasunidades.units.index', compact('units', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.gestaotrocasunidades.units.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitRequest $request)
    {
        $this->repository->create($request->all());
        $url = $request->get('redirectTo', route('units.index'));
        $request->session()->flash('message', 'Unidade cadastrada com sucesso!');
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
        $unit = $this->repository->find($id);
        return view('modules.gestaotrocasunidades.units.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UnitRequest $request, $id)
    {
        $this->repository->update($request->all(), $id);
        $url = $request->get('redirectTo', route('units.index'));
        $request->session()->flash('message', 'Unidade atualizada com sucesso!');
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
        \Session::flash('message', 'Unidade removida com sucesso!');
        return redirect()->to(\URL::previous());
    }
}
