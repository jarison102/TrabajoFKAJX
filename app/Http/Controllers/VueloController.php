<?php

namespace App\Http\Controllers;

use App\Models\Vuelo;
use Illuminate\Http\Request;

/**
 * Class VueloController
 * @package App\Http\Controllers
 */
class VueloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vuelos = Vuelo::paginate();

        return view('vuelo.index', compact('vuelos'))
            ->with('i', (request()->input('page', 1) - 1) * $vuelos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vuelo = new Vuelo();
        return view('vuelo.create', compact('vuelo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Vuelo::$rules);

        $vuelo = Vuelo::create($request->all());

        return redirect()->route('Vuelo.index')
            ->with('success', 'Vuelo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vuelo = Vuelo::find($id);

        return view('vuelo.show', compact('vuelo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vuelo = Vuelo::find($id);

        return view('vuelo.edit', compact('vuelo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Vuelo $vuelo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vuelo $vuelo)
    {
        request()->validate(Vuelo::$rules);

        $vuelo->update($request->all());

        return redirect()->route('vuelos.index')
            ->with('success', 'Vuelo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $vuelo = Vuelo::find($id)->delete();

        return redirect()->route('Vuelo.index')
            ->with('success', 'Vuelo deleted successfully');
    }
}
