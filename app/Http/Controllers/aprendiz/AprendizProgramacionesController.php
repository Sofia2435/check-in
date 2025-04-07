<?php

namespace App\Http\Controllers\aprendiz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Programaciones;

class AprendizProgramacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $programacion = Programaciones::query();

        if ($request->filled('nombre_asignatura')) {
            $programacion->where('nombre_asignatura', 'like', '%' . $request->nombre_asignatura . '%');
        }
    
        if ($request->filled('ficha')) {
            $programacion->where('ficha', 'like', '%' . $request->ficha . '%');
        }
    
        if ($request->filled('ambiente')) {
            $programacion->where('ambiente', 'like', '%' . $request->ambiente . '%');
        }
    
        $programacion = $programacion->get();
    
        return view('aprendiz.programacioness.index', compact('programacion'));
    }

    
}
