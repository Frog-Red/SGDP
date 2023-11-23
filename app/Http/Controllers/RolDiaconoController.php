<?php

namespace App\Http\Controllers;

// app/Http/Controllers/RolDiaconoController.php

use App\Models\RolDiacono;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolDiaconoController extends Controller
{
    public function index()
    {
        $rolesDiacono = RolDiacono::all();
        return view('roles_diacono.index', compact('rolesDiacono'));
    }

    public function create()
    {
        return view('roles_diacono.create');
    }

    public function store(Request $request)
    {
        $rolDiacono = RolDiacono::create($request->all());
        return redirect()->route('roles_diacono.index')->with('success', 'Rol Diacono created successfully');
    }

    public function show($id)
    {
        $rolDiacono = RolDiacono::find($id);
        return view('roles_diacono.show', compact('rolDiacono'));
    }

    public function edit($id)
    {
        $rolDiacono = RolDiacono::find($id);
        return view('roles_diacono.edit', compact('rolDiacono'));
    }

    public function update(Request $request, $id)
    {
        $rolDiacono = RolDiacono::find($id);
        $rolDiacono->update($request->all());
        return redirect()->route('roles_diacono.index')->with('success', 'Rol Diacono updated successfully');
    }

    public function destroy($id)
    {
        $rolDiacono = RolDiacono::find($id);
        $rolDiacono->delete();
        return redirect()->route('roles_diacono.index')->with('success', 'Rol Diacono deleted successfully');
    }
}

