<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminInstructorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:administrador']); 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('roles', 'instructor')->get(); 

        return view('admin.instructor.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
           return view('admin.instructor.create');
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

        
        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']);
        $user->save();

        return redirect()->route('instructor.index')->with('success', 'Instructor creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);   
        return view('admin.instructor.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);   
        return view('admin.instructor.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);  

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

        return redirect()->route('instructor.index')->with('success', 'Instructor actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('instructor.index')->with('success', 'Instructor eliminado correctamente.');
    }
}
