<?php

// app/Http/Controllers/RoleController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\roles;

class rolesController extends Controller
{
    public function index()
    {
        $roles = roles::all();

        return view('roles.index', compact('roles'));
    }

    // Add other methods like create, edit, update, delete as needed

    // Example create method
    public function create()
    {
        return view('roles.create');
    }

    // Example store method
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles',
        ]);

        roles::create($request->all());

        return redirect()->route('roles.index')
            ->with('success', 'Roles created successfully');
    }

    // Example edit method
    public function edit(roles $roles)
    {
        return view('roles.edit', compact('roles'));
    }

    // Example update method
    public function update(Request $request, roles $roles)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name,' . $roles->id,
        ]);

        $roles->update($request->all());

        return redirect()->route('roles.index')
            ->with('success', 'Roles updated successfully');
    }

    // Example destroy method
    public function destroy(roles $role)
    {
        $roles->delete();

        return redirect()->route('roles.index')
            ->with('success', 'Roles deleted successfully');
    }
}
