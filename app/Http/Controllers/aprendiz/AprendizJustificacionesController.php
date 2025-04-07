<?php

namespace App\Http\Controllers\aprendiz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Justificaciones;
use Illuminate\Support\Facades\Auth;

class AprendizJustificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $justificacion = Justificaciones::where('user_id', Auth::id())->get();
        return view('aprendiz.justificacion.index', compact('justificacion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aprendiz.justificacion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'motivo' => 'required|string',
            'documento' => 'nullable|file|mimes:pdf,jpg,png,docx'
        ]);

        $justificacion = new Justificaciones();
        $justificacion->user_id = Auth::id();
        $justificacion->motivo = $request->motivo;

        if ($request->hasFile('documento')) {
            $archivo = $request->file('documento');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            $archivo->move(public_path('documentos'), $nombreArchivo);
            $justificacion->documento = $nombreArchivo;
        }

        $justificacion->save();

        return redirect()->route('aprendiz.justificacion.index')->with('success', 'Justificación enviada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $justificacion = Justificaciones::where('id', $id)
        ->where('user_id', Auth::id())
        ->firstOrFail();

        return view('aprendiz.justificacion.show', compact('justificacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $justificacion = Justificaciones::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('aprendiz.justificacion.edit', compact('justificacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $justificacion = Justificaciones::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $justificacion->motivo = $request->motivo;

        if ($request->hasFile('documento')) {
            $archivo = $request->file('documento');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            $archivo->move(public_path('documentos'), $nombreArchivo);
            $justificacion->documento = $nombreArchivo;
        }

        $justificacion->save();

        return redirect()->route('aprendiz.justificacion.index')->with('success', 'Justificación actualizada');
    }

}
