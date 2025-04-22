<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarnetDigital;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminCarnetDigitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carnets = CarnetDigital::latest()->get();
        return view('admin.carnets_digital.index', compact('carnets'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $carnet = CarnetDigital::findOrFail($id);
        return view('admin/carnets_digital.edit', compact('carnet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $carnet = CarnetDigital::findOrFail($id);

        if ($request->hasFile('foto')) {
           
            if ($carnet->foto && Storage::disk('public')->exists($carnet->foto)) {
                Storage::disk('public')->delete($carnet->foto);
            }

            $path = $request->file('foto')->store('carnets', 'public');
            $carnet->foto = $path;
            $carnet->save();
        }

        return redirect()->route('carnets_digital.index')->with('success', 'Carnet actualizado correctamente.');
    }

}
