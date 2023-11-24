<?php

namespace App\Http\Controllers;

// app/Http/Controllers/ParroquiaController.php

use App\Models\Parroquia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParroquiaController extends Controller
{
    public function index()
    {
        $parroquia = Parroquia::all();
        return view('parroquia.index', compact('parroquia'));
    }

    public function create()
    {
        return view('parroquia.create');
    }

    public function store(Request $request)
    {
        $parroquia = Parroquia::create($request->all());
        return redirect()->route('parroquia.index')->with('success', 'Parroquia created successfully');
    }

    public function show($id)
    {
        $parroquia = Parroquia::find($id);
        return view('parroquia.show', compact('parroquia'));
    }

    public function edit($id)
    {
        $parroquia = Parroquia::find($id);
        return view('parroquia.edit', compact('parroquia'));
    }

    public function update(Request $request, $id)
    {
        $parroquia = Parroquia::find($id);
        $parroquia->update($request->all());
        return redirect()->route('parroquia.index')->with('success', 'Parroquia updated successfully');
    }

    public function destroy($id)
    {
        $parroquia = Parroquia::find($id);
        $parroquia->delete();
        return redirect()->route('parroquia.index')->with('success', 'Parroquia deleted successfully');
    }
}
