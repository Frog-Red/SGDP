<?php

namespace App\Http\Controllers;

// app/Http/Controllers/vicaria_ambientalController.php

use App\Models\vicaria_ambiental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class vicaria_ambientalController extends Controller
{
    public function index()
    {
        $vicaria_ambiental = vicaria_ambiental::all();
        return view('vicaria_ambiental.index', compact('vicaria_ambiental'));
    }

    public function create()
    {
        return view('vicaria_ambiental.create');
    }

    public function store(Request $request)
    {
        $vicaria_ambiental = vicaria_ambiental::create($request->all());
        return redirect()->route('vicaria_ambiental.index')->with('success', 'Vicaria Ambiental created successfully');
    }

    public function show($id)
    {
        $vicaria_ambiental = vicaria_ambiental::find($id);
        return view('vicaria_ambiental.show', compact('vicaria_ambiental'));
    }

    public function edit($id)
    {
        $vicaria_ambiental = vicaria_ambiental::find($id);
        return view('vicaria_ambiental.edit', compact('vicaria_ambiental'));
    }

    public function update(Request $request, $id)
    {
        $vicaria_ambiental = vicaria_ambiental::find($id);
        $vicaria_ambiental->update($request->all());
        return redirect()->route('vicaria_ambiental.index')->with('success', 'Vicaria Ambiental updated successfully');
    }

    public function destroy($id)
    {
        $vicaria_ambiental = vicaria_ambiental::find($id);
        $vicaria_ambiental->delete();
        return redirect()->route('vicaria_ambiental.index')->with('success', 'Vicaria Ambiental deleted successfully');
    }
}

