<?php

namespace App\Http\Controllers;

// app/Http/Controllers/RolPastoralController.php

use App\Models\RolPastoral;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolPastoralController extends Controller
{
    public function index()
    {
        $rolesPastorales = RolPastoral::all();
        return view('roles_pastorales.index', compact('rolesPastorales'));
    }

    public function create()
    {
        return view('roles_pastorales.create');
    }

    public function store(Request $request)
    {
        $rolPastoral = RolPastoral::create($request->all());
        return redirect()->route('roles_pastorales.index')->with('success', 'Rol Pastoral created successfully');
    }

    public function show($id)
    {
        $rolPastoral = RolPastoral::find($id);
        return view('roles_pastorales.show', compact('rolPastoral'));
    }

    public function edit($id)
    {
        $rolPastoral = RolPastoral::find($id);
        return view('roles_pastorales.edit', compact('rolPastoral'));
    }

    public function update(Request $request, $id)
    {
        $rolPastoral = RolPastoral::find($id);
        $rolPastoral->update($request->all());
        return redirect()->route('roles_pastorales.index')->with('success', 'Rol Pastoral updated successfully');
    }

    public function destroy($id)
    {
        $rolPastoral = RolPastoral::find($id);
        $rolPastoral->delete();
        return redirect()->route('roles_pastorales.index')->with('success', 'Rol Pastoral deleted successfully');
    }
}

