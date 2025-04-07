<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminAprendizController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:administrador']);  // Verifica que el usuario sea un administrador
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('roles', 'aprendiz')->get(); // Filtrar por rol de aprendiz

        return view('admin.aprendices.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
           return view('admin.aprendices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        // Crear el aprendiz
        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']);
        $user->save();

        return redirect()->route('aprendices.index')->with('success', 'Aprendiz creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);  // Buscar al aprendiz por ID
        return view('admin.aprendices.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);  // Buscar al aprendiz por ID
        return view('admin.aprendices.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);  // Buscar al aprendiz por ID

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        if ($request->password) {
            $user->password = bcrypt($validated['password']);
        }
        $user->save();

        return redirect()->route('aprendices.index')->with('success', 'Aprendiz actualizado correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('aprendices.index')->with('success', 'Aprendiz eliminado correctamente.');
    }
}
