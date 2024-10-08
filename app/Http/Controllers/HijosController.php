<?php

namespace App\Http\Controllers;

// app/Http/Controllers/HijosController.php
use App\Models\Diacono; // Adjust the namespace as needed
use App\Models\Hijos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HijosController extends Controller
{
    public function index()
    {
        $hijos = Hijos::all();
        return view('hijos.index', compact('hijos'));
    }

    public function create()
    {
        $diaconos = Diacono::all();
        return view('hijos.create', compact('diaconos'));
    }

    public function store(Request $request)
    {
        $hijo = Hijos::create($request->all());
        return redirect()->route('hijos.index')->with('success', 'Hijo created successfully');
    }

    public function show($id)
    {
        $hijo = Hijos::find($id);
        return view('hijos.show', compact('hijo'));
    }

    public function edit($id)
    {
        $diaconos = Diacono::all();
        $hijo = Hijos::find($id);
        return view('hijos.edit', compact('hijo','diaconos'));
    }

    public function update(Request $request, $id)
    {
        $hijo = Hijos::find($id);
        $hijo->update($request->all());
        return redirect()->route('hijos.index')->with('success', 'Hijo updated successfully');
    }

    public function destroy($id)
    {
        $hijo = Hijos::find($id);
        $hijo->delete();
        return redirect()->route('hijos.index')->with('success', 'Hijo deleted successfully');
    }
}
