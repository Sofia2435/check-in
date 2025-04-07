<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RegistroEquipos;
use Illuminate\Http\Request;

class AdminRegistroEquipoController extends Controller
{
    /**
     * AdminRegistroEquipoController constructor.
     */
    public function __construct()
    {
        // Asegura que solo los usuarios autenticados y con el rol 'administrador' puedan acceder
        $this->middleware(['auth', 'role:administrador']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = RegistroEquipos::with('user');
    
        if ($request->has('tipo_equipo') && $request->tipo_equipo != '') {
            $query->where('tipo_equipo', $request->tipo_equipo);
        }
    
        if ($request->has('marca') && $request->marca != '') {
            $query->where('marca', $request->marca);
        }
    
        if ($request->has('nombre_equipo') && $request->nombre_equipo != '') {
            $query->where('nombre_equipo', $request->nombre_equipo);
        }
    
        $equipos = $query->latest()->get();
    
        return view('admin.registros-equipo.index', compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     */

     public function show($id)
     {
         $equipo = RegistroEquipos::with('user')->findOrFail($id);
         return view('admin.registros-equipo.show', compact('equipo'));
     }
    /**
     * Store a newly created resource in storage.
     */
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $equipo = RegistroEquipos::findOrFail($id);
        return view('admin.registros-equipo.edit', compact('equipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $equipo = RegistroEquipos::findOrFail($id);

        $validated = $request->validate([
            'nombre_equipo' => 'required|string|max:255',
            'tipo_equipo' => 'required|string',
            'marca' => 'required|string',
            'serial' => 'required|string',
            'descripcion' => 'nullable|string',
        ]);

        $equipo->nombre_equipo = $validated['nombre_equipo'];
        $equipo->tipo_equipo = $validated['tipo_equipo'];
        $equipo->marca = $validated['marca'];
        $equipo->serial = $validated['serial'];
        $equipo->descripcion = $validated['descripcion'];
        $equipo->save();

        return redirect()->route('registros-equipo.index')->with('success', 'Equipo actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $equipo = RegistroEquipos::findOrFail($id);
        $equipo->delete();

        return redirect()->route('registros-equipo.index')->with('success', 'Equipo eliminado exitosamente.');
    }
}

