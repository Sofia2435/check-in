<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Programaciones;
use App\Models\User;

class AdminProgramacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programaciones = Programaciones::all(); 
        return view('admin.programaciones.index', compact('programaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('admin.programaciones.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_asignatura' => 'required|string',
            'descripcion' => 'nullable|string',
            'ficha' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'ambiente' => 'nullable|string',
        ]);

        Programaciones::create([
            'user_id' => auth()->id(),
            'nombre_asignatura' => $request->nombre_asignatura,
            'descripcion' => $request->descripcion,
            'ficha' => $request->ficha,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'hora_inicio' => $request->hora_inicio,
            'hora_fin' => $request->hora_fin,
            'ambiente' => $request->ambiente,
        ]);

        return redirect()->route('programaciones.index')->with('success', 'Programación registrada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $programaciones = Programaciones::findOrFail($id);
        return view('admin.programaciones.show', compact('programaciones'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $programaciones = Programaciones::findOrFail($id);
        return view('admin.programaciones.edit', compact('programaciones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre_asignatura' => 'required|string',
            'descripcion' => 'nullable|string',
            'ficha' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'ambiente' => 'nullable|string',
        ]);
    
        $programaciones = Programaciones::findOrFail($id);
        $programaciones->update($request->all());
    
        return redirect()->route('programaciones.index')->with('success', 'Programación actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $programaciones = Programaciones::findOrFail($id);
        $programaciones->delete();
    
        return redirect()->route('programaciones.index')->with('success', 'Programación eliminada correctamente.');
    }
}
