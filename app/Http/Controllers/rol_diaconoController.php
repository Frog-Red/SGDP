<?php

namespace App\Http\Controllers;

// app/Http/Controllers/rol_diaconoController.php

use App\Models\rol_diacono;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class rol_diaconoController extends Controller
{
    public function index()
    {
        $rol_diacono = rol_diacono::all();
        return view('rol_diacono.index', compact('rol_diacono'));
    }

    public function create()
    {
        return view('rol_diacono.create');
    }

    public function store(Request $request)
    {
        $rol_diacono = rol_diacono::create($request->all());
        return redirect()->route('rol_diacono.index')->with('success', 'Rol Diacono created successfully');
    }

    public function show($id)
    {
        $rol_diacono = rol_diacono::find($id);
        return view('rol_diacono.show', compact('rol_diacono'));
    }

    public function edit($id)
    {
        $rol_diacono = rol_diacono::find($id);
        return view('rol_diacono.edit', compact('rol_diacono'));
    }

    public function update(Request $request, $id)
    {
        $rol_diacono = rol_diacono::find($id);
        $rol_diacono->update($request->all());
        return redirect()->route('rol_diacono.index')->with('success', 'Rol Diacono updated successfully');
    }

    public function destroy($id)
    {
        $rol_diacono = rol_diacono::find($id);
        $rol_diacono->delete();
        return redirect()->route('rol_diacono.index')->with('success', 'Rol Diacono deleted successfully');
    }
}

