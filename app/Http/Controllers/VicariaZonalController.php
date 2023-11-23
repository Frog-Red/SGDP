<?php

namespace App\Http\Controllers;

// app/Http/Controllers/VicariaZonalController.php

use App\Models\VicariaZonal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VicariaZonalController extends Controller
{
    public function index()
    {
        $vicariaZonales = VicariaZonal::all();
        return view('vicaria_zonales.index', compact('vicariaZonales'));
    }

    public function create()
    {
        return view('vicaria_zonales.create');
    }

    public function store(Request $request)
    {
        $vicariaZonal = VicariaZonal::create($request->all());
        return redirect()->route('vicaria_zonales.index')->with('success', 'Vicaria Zonal created successfully');
    }

    public function show($id)
    {
        $vicariaZonal = VicariaZonal::find($id);
        return view('vicaria_zonales.show', compact('vicariaZonal'));
    }

    public function edit($id)
    {
        $vicariaZonal = VicariaZonal::find($id);
        return view('vicaria_zonales.edit', compact('vicariaZonal'));
    }

    public function update(Request $request, $id)
    {
        $vicariaZonal = VicariaZonal::find($id);
        $vicariaZonal->update($request->all());
        return redirect()->route('vicaria_zonales.index')->with('success', 'Vicaria Zonal updated successfully');
    }

    public function destroy($id)
    {
        $vicariaZonal = VicariaZonal::find($id);
        $vicariaZonal->delete();
        return redirect()->route('vicaria_zonales.index')->with('success', 'Vicaria Zonal deleted successfully');
    }
}

