<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use App\Models\Programaciones;
use Illuminate\Http\Request;

class InstructorProgramacionController extends Controller
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

    $programacion = $programacion->get(); // aquí sí ejecutas la consulta filtrada

    return view('instructores.programacions.index', compact('programacion'));
}



}
