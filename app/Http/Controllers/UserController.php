<?php

// UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\roles;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
// UserController.php

public function index()
{
    $roles = roles::all();
    $users = User::with('roles')->get();
    return view('users.index', compact('users', 'roles'));
}


public function create()
{
    $roles = roles::all();
    return view('users.create', compact('roles'));
}

public function store(Request $request)
{
    // Validation logic...

    $user = User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
    ]);

    // Attach roles to the user
    $user->roles()->attach($request->input('roles'));

    return redirect()->route('users.index')->with('success', 'User created successfully');
}

    public function edit(User $user)
    {
        $roles = roles::all();
        $userRoles = $user->roles->pluck('id')->toArray();
    
        return view('users.edit', compact('user', 'roles', 'userRoles'));
    }

    public function update(Request $request, User $user)
    {
        // Validate and update the user
        // ...
    
        // Sync roles for the user
        $user->roles()->sync($request->input('roles'));
    
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
    public function destroy(User $user)
{
    $user->delete();

    return redirect()->route('users.index')->with('success', 'User deleted successfully');
}

public function showChangePasswordForm()
{
    return view('users.contrasena');
}

public function changePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
    ]);

    $user = auth()->user();

    // Check if the current password matches the one in the database
    if (Hash::check($request->current_password, $user->password)) {
        // Update the password
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('home')->with('success', 'Password changed successfully.');
    }

    return redirect()->back()->with('error', 'Current password is incorrect.');
}
}
