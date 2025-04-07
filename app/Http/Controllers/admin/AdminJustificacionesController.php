<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Justificaciones;

class AdminJustificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $justificaciones = Justificaciones::with('user')->get();
        return view('admin.justificaciones.index', compact('justificaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $justificacion = Justificaciones::findOrFail($id);
        return view('admin.justificaciones.edit', compact('justificacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $justificacion = Justificaciones::findOrFail($id);
        $justificacion->motivo = $request->motivo;

        if ($request->hasFile('documento')) {
            $archivo = $request->file('documento');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            $archivo->move(public_path('documentos'), $nombreArchivo);
            $justificacion->documento = $nombreArchivo;
        }

        $justificacion->save();

        return redirect()->route('admin.justificaciones.index')->with('success', 'Justificación actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $justificacion = Justificaciones::findOrFail($id);
        $justificacion->delete();

        return redirect()->route('admin.justificaciones.index')->with('success', 'Justificación eliminada correctamente');
    }
}
