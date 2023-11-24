<?php

namespace App\Http\Controllers;

// app/Http/Controllers/vicaria_zonalController.php

use App\Models\vicaria_zonal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class vicariazonalController extends Controller
{
    public function index()
    {
        $vicaria_zonal = vicaria_zonal::all();
        return view('vicaria_zonal.index', compact('vicaria_zonal'));
    }

    public function create()
    {
        return view('vicaria_zonal.create');
    }

    public function store(Request $request)
    {
        $vicaria_zonal = vicaria_zonal::create($request->all());
        return redirect()->route('vicaria_zonal.index')->with('success', 'Vicaria zonal created successfully');
    }

    public function show($id)
    {
        $vicaria_zonal = vicaria_zonal::find($id);
        return view('vicaria_zonal.show', compact('vicaria_zonal'));
    }

    public function edit($id)
    {
        $vicaria_zonal = vicaria_zonal::find($id);
        return view('vicaria_zonal.edit', compact('vicaria_zonal'));
    }

    public function update(Request $request, $id)
    {
        $vicaria_zonal = vicaria_zonal::find($id);
        $vicaria_zonal->update($request->all());
        return redirect()->route('vicaria_zonal.index')->with('success', 'Vicaria zonal updated successfully');
    }

    public function destroy($id)
    {
        $vicaria_zonal = vicaria_zonal::find($id);
        $vicaria_zonal->delete();
        return redirect()->route('vicaria_zonal.index')->with('success', 'Vicaria zonal deleted successfully');
    }
}

