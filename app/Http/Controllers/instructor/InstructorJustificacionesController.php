<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Justificaciones;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class InstructorJustificacionesController extends Controller
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = Justificaciones::with('user');

    if ($request->filled('motivo')) {
        $query->where('motivo', $request->input('motivo'));
    }

    $justificacion = $query->get();

    // Obtener motivos únicos desde la base de datos
    $motivos = Justificaciones::select('motivo')->distinct()->pluck('motivo');

    return view('instructores.justificacion.index', compact('justificacion', 'motivos'));
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

        return redirect()->route('instructores.justificacion.index')->with('success', 'Justificación enviada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $justificacion = Justificaciones::where('id', $id)
        ->where('user_id', Auth::id())
        ->firstOrFail();

        return view('instructores.justificacion.show', compact('justificacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $justificacion = Justificaciones::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('instructores.justificacion.edit', compact('justificacion'));
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

        return redirect()->route('instructores.justificacion.index')->with('success', 'Justificación actualizada');
    }

}
