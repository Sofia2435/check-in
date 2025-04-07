<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarnetDigital;
use Illuminate\Support\Facades\Auth;

class InstructorCarnetDigitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carnets = CarnetDigital::where('user_id', Auth::id())->get();
        return view('instructores.carnet_digital.index', compact('carnets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('instructores.carnet_digital.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo_usuario' => 'required|string',
            'nombre_completo' => 'required|string|max:255',
            'ficha' => 'nullable|string|max:50',
            'programa' => 'required|string|max:255',
            'jornada' => 'required|string|max:50',
        ]);
    
        CarnetDigital::create([
            'user_id' => Auth::id(),
            'tipo_usuario' => $request->tipo_usuario,
            'nombre_completo' => $request->nombre_completo,
            'ficha' => $request->ficha,
            'programa' => $request->programa,
            'jornada' => $request->jornada,
            // 'foto' lo sube el admin
        ]);
    
        return redirect()->route('carnet_digital.index')->with('success', 'Formulario enviado correctamente');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('instructores.carnet_digital.create');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $carnet = CarnetDigital::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

    $request->validate([
        'tipo_usuario' => 'required|string',
        'nombre_completo' => 'required|string|max:255',
        'ficha' => 'nullable|string|max:50',
        'programa' => 'required|string|max:255',
        'jornada' => 'required|string|max:50',
    ]);

    $carnet->update([
        'tipo_usuario' => $request->tipo_usuario,
        'nombre_completo' => $request->nombre_completo,
        'ficha' => $request->ficha,
        'programa' => $request->programa,
        'jornada' => $request->jornada,
    ]);

    return redirect()->back()->with('success', 'Datos actualizados correctamente');
    }
}
