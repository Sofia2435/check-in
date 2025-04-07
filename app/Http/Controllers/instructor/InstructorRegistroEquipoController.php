<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RegistroEquipos;
use Illuminate\Support\Facades\Auth;
class InstructorRegistroEquipoController extends Controller
{
    public function index()
    {
        $equipos = RegistroEquipos::where('user_id', Auth::id())->get();
        return view('instructores.registro_equipo.index', compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('instructores.registro_equipo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo_equipo'    => 'required|string|max:255',
            'nombre_equipo'  => 'required|string|max:255',
            'marca'          => 'required|string|max:255',
            'serial'         => 'required|string|max:255',
            'descripcion'    => 'nullable|string|max:1000',
        ]);
    
        RegistroEquipos::create([
            'user_id'        => Auth::id(), // Esto guarda el ID del aprendiz que está autenticado
            'tipo_equipo'    => $request->tipo_equipo,
            'nombre_equipo'  => $request->nombre_equipo,
            'marca'          => $request->marca,
            'serial'         => $request->serial,
            'descripcion'    => $request->descripcion,
        ]);
    
        return redirect()->route('registro_equipo.index')->with('success', 'Equipo registrado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $equipo = RegistroEquipos::findOrFail($id);
        return view('instructores.registro_equipo.show', compact('equipo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $equipo = RegistroEquipos::findOrFail($id);
        return view('instructores.registro_equipo.edit', compact('equipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tipo_equipo' => 'required|string|max:255',
            'nombre_equipo' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'serial' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);
    
        $equipo = RegistroEquipos::findOrFail($id);
        $equipo->update($request->all());
    
        return redirect()->route('registro_equipo.index')->with('success', 'Equipo actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $equipo = RegistroEquipos::findOrFail($id);
        $equipo->delete();

        return redirect()->route('registro_equipo.index')->with('success', 'Equipo eliminado correctamente.');
    }
}
