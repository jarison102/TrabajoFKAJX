<?php

namespace App\Http\Controllers;

use App\Models\Ciudade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


/**
 * Class CiudadeController
 * @package App\Http\Controllers
 */
class CiudadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciudades = Ciudade::paginate();

        return view('ciudade.index', compact('ciudades'))
            ->with('i', (request()->input('page', 1) - 1) * $ciudades->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciudade = new Ciudade();
        return view('ciudade.create', compact('ciudade'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Ciudade::$rules);

        $ciudade = Ciudade::create($request->all());

        return redirect()->route('Ciudad.index')
            ->with('success', 'Ciudade created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ciudade = Ciudade::find($id);

        return view('ciudade.show', compact('ciudade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ciudade = Ciudade::find($id);

        return view('ciudade.edit', compact('ciudade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Ciudade $ciudade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ciudade $ciudade)
    {
        request()->validate(Ciudade::$rules);

        $ciudade->update($request->all());

        return redirect()->route('ciudades.index')
            ->with('success', 'Ciudade updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ciudade = Ciudade::find($id)->delete();

        return redirect()->route('Ciudad.index')
            ->with('success', 'Ciudade deleted successfully');
    }

    public function obtenerCiudades(Request $request)
    {
        $paisId = $request->input('pais_id'); // Obtener el ID del país seleccionado por el usuario
    
        // Verificar si se seleccionó Colombia
        if ($paisId == 5) { // Ahora sabemos que el ID de Colombia en tu base de datos es 5
            // Obtener los IDs de los departamentos asociados a Colombia
            $departamentoIds = DB::table('departamento_pais')->where('pais_id', $paisId)->pluck('departamento_id');
    
            // Obtener los IDs de las ciudades asociadas a estos departamentos
            $ciudadIds = DB::table('ciudad_departamento')->whereIn('departamento_id', $departamentoIds)->pluck('ciudad_id');
    
            // Obtener las ciudades asociadas a estos IDs
            $ciudades = Ciudade::whereIn('id', $ciudadIds)->get();
    
            return response()->json($ciudades); // Devolver las ciudades en formato JSON
        } else {
            return response()->json([]); // Si no se seleccionó Colombia, devolver un arreglo vacío
        }
    }
    
}
