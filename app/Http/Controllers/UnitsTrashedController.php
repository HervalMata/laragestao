<?php

namespace GestaoTrocas\Http\Controllers;

use GestaoTrocas\Repositories\UnitRepository;
use Illuminate\Http\Request;

class UnitsTrashedController extends Controller
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
        $this->repository->onlyTrashed();
        $units = $this->repository->paginate(10);
        return view('trashed.units.index', compact('units', 'search'));
    }

    public function show($id)
    {
        $this->repository->onlyTrashed();
        $units = $this->repository->find($id);

        return view('trashed.units.show', compact('units'));
    }

    public function update(Request $request, $id)
    {
        $this->repository->onlyTrashed();
        $this->repository->restore($id);

        $url = $request->get('redirect_to', route('trashed.units.index'));
        $request->session()->flash('message', 'Unidade restaurada com sucesso.');
        return redirect()->to($url);
    }
}
