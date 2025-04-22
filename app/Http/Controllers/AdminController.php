<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RegistroEquipos;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalAprendices =  User::where('roles', 'aprendiz')->count();
        $totalInstructores = User::where('roles', 'instructor')->count();
        $totalRegistrosEquipos = RegistroEquipos::count();
    
        return view('admin.dashboard', compact('totalAprendices', 'totalInstructores', 'totalRegistrosEquipos'));
    }

    public function index()
    {
        if (auth()->user()->tipo_usuario == 'admin') {
            $usuarios = User::all();
        } else {
            $usuarios = User::where('tipo_usuario', 'aprendiz')->get();
        }
    
        return view('aprendices.index', compact('usuarios'));
    }
    
}

