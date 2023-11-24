<?php
namespace App\Http\Controllers;

// app/Http/Controllers/rol_pastoralController.php

use App\Models\rol_pastoral;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class rol_pastoralController extends Controller
{
    public function index()
    {
        $rol_pastoral = rol_pastoral::all();
        return view('rol_pastoral.index', compact('rol_pastoral'));
    }

    public function create()
    {
        return view('rol_pastoral.create');
    }

    public function store(Request $request)
    {
        $rol_pastoral = rol_pastoral::create($request->all());
        return redirect()->route('rol_pastoral.index')->with('success', 'Rol Pastoral created successfully');
    }

    public function show($id)
    {
        $rol_pastoral = rol_pastoral::find($id);
        return view('rol_pastoral.show', compact('rol_pastoral'));
    }

    public function edit($id)
    {
        $rol_pastoral = rol_pastoral::find($id);
        return view('rol_pastoral.edit', compact('rol_pastoral'));
    }

    public function update(Request $request, $id)
    {
        $rol_pastoral = rol_pastoral::find($id);
        $rol_pastoral->update($request->all());
        return redirect()->route('rol_pastoral.index')->with('success', 'Rol Pastoral updated successfully');
    }

    public function destroy($id)
    {
        $rol_pastoral = rol_pastoral::find($id);
        $rol_pastoral->delete();
        return redirect()->route('rol_pastoral.index')->with('success', 'Rol Pastoral deleted successfully');
    }
}
