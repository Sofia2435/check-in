<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RegistroEquipos;


class AprendizController extends Controller
{
    public function dashboard()
    {
      
        return view('aprendiz.dashboard');
    }

    
}
