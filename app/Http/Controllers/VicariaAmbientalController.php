<?php

namespace App\Http\Controllers;

// app/Http/Controllers/VicariaAmbientalController.php

use App\Models\VicariaAmbiental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VicariaAmbientalController extends Controller
{
    public function index()
    {
        $vicariaAmbientales = VicariaAmbiental::all();
        return view('vicaria_ambientales.index', compact('vicariaAmbientales'));
    }

    public function create()
    {
        return view('vicaria_ambientales.create');
    }

    public function store(Request $request)
    {
        $vicariaAmbiental = VicariaAmbiental::create($request->all());
        return redirect()->route('vicaria_ambientales.index')->with('success', 'Vicaria Ambiental created successfully');
    }

    public function show($id)
    {
        $vicariaAmbiental = VicariaAmbiental::find($id);
        return view('vicaria_ambientales.show', compact('vicariaAmbiental'));
    }

    public function edit($id)
    {
        $vicariaAmbiental = VicariaAmbiental::find($id);
        return view('vicaria_ambientales.edit', compact('vicariaAmbiental'));
    }

    public function update(Request $request, $id)
    {
        $vicariaAmbiental = VicariaAmbiental::find($id);
        $vicariaAmbiental->update($request->all());
        return redirect()->route('vicaria_ambientales.index')->with('success', 'Vicaria Ambiental updated successfully');
    }

    public function destroy($id)
    {
        $vicariaAmbiental = VicariaAmbiental::find($id);
        $vicariaAmbiental->delete();
        return redirect()->route('vicaria_ambientales.index')->with('success', 'Vicaria Ambiental deleted successfully');
    }
}

