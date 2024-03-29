<?php

namespace App\Http\Controllers;

use App\Models\CiudadDepartamento;
use Illuminate\Http\Request;
use App\Models\Departamento;
use Illuminate\Support\Facades\DB;

/**
 * Class CiudadDepartamentoController
 * @package App\Http\Controllers
 */
class CiudadDepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciudadDepartamentos = CiudadDepartamento::paginate();

        return view('ciudad-departamento.index', compact('ciudadDepartamentos'))
            ->with('i', (request()->input('page', 1) - 1) * $ciudadDepartamentos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciudadDepartamento = new CiudadDepartamento();
        return view('ciudad-departamento.create', compact('ciudadDepartamento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(CiudadDepartamento::$rules);

        $ciudadDepartamento = CiudadDepartamento::create($request->all());

        return redirect()->route('ciudad-departamentos.index')
            ->with('success', 'CiudadDepartamento created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ciudadDepartamento = CiudadDepartamento::find($id);

        return view('ciudad-departamento.show', compact('ciudadDepartamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ciudadDepartamento = CiudadDepartamento::find($id);

        return view('ciudad-departamento.edit', compact('ciudadDepartamento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CiudadDepartamento $ciudadDepartamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CiudadDepartamento $ciudadDepartamento)
    {
        request()->validate(CiudadDepartamento::$rules);

        $ciudadDepartamento->update($request->all());

        return redirect()->route('ciudad-departamentos.index')
            ->with('success', 'CiudadDepartamento updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ciudadDepartamento = CiudadDepartamento::find($id)->delete();

        return redirect()->route('ciudad-departamentos.index')
            ->with('success', 'CiudadDepartamento deleted successfully');
    }

    public function obtenerDepartamentos(Request $request)
    {
        $ciudadId = $request->input('ciudad_id'); // Obtener el ID de la ciudad seleccionada por el usuario
    
        // Verificar si se seleccionó Bogotá
        if ($ciudadId == 4) { // Ahora sabemos que el ID de Bogotá en tu base de datos es 4
            // Obtener los IDs de los departamentos asociados a Bogotá
            $departamentoIds = DB::table('ciudad_departamento')->where('ciudad_id', $ciudadId)->pluck('departamento_id');
    
            // Obtener los departamentos asociados a estos IDs
            $departamentos = Departamento::whereIn('id', $departamentoIds)->get();
    
            return response()->json($departamentos); // Devolver los departamentos en formato JSON
        } else {
            return response()->json([]); // Si no se seleccionó Bogotá, devolver un arreglo vacío
        }
    }
    


}
