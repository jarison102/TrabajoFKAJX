<?php

namespace App\Http\Controllers;

use App\Models\DepartamentoPai;
use Illuminate\Http\Request;

/**
 * Class DepartamentoPaiController
 * @package App\Http\Controllers
 */
class DepartamentoPaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentoPais = DepartamentoPai::paginate();

        return view('departamento-pai.index', compact('departamentoPais'))
            ->with('i', (request()->input('page', 1) - 1) * $departamentoPais->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentoPai = new DepartamentoPai();
        return view('departamento-pai.create', compact('departamentoPai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DepartamentoPai::$rules);

        $departamentoPai = DepartamentoPai::create($request->all());

        return redirect()->route('departamento-pais.index')
            ->with('success', 'DepartamentoPai created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departamentoPai = DepartamentoPai::find($id);

        return view('departamento-pai.show', compact('departamentoPai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departamentoPai = DepartamentoPai::find($id);

        return view('departamento-pai.edit', compact('departamentoPai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DepartamentoPai $departamentoPai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DepartamentoPai $departamentoPai)
    {
        request()->validate(DepartamentoPai::$rules);

        $departamentoPai->update($request->all());

        return redirect()->route('departamento-pais.index')
            ->with('success', 'DepartamentoPai updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $departamentoPai = DepartamentoPai::find($id)->delete();

        return redirect()->route('departamento-pais.index')
            ->with('success', 'DepartamentoPai deleted successfully');
    }
}
