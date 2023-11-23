<?php

namespace App\Http\Controllers;

// app/Http/Controllers/HistorialDiaconoController.php

use App\Models\HistorialDiacono;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistorialDiaconoController extends Controller
{
    public function index()
    {
        $historialesDiacono = HistorialDiacono::all();
        return view('historiales_diacono.index', compact('historialesDiacono'));
    }

    public function create()
    {
        return view('historiales_diacono.create');
    }

    public function store(Request $request)
    {
        $historialDiacono = HistorialDiacono::create($request->all());
        return redirect()->route('historiales_diacono.index')->with('success', 'Historial Diacono created successfully');
    }

    public function show($id)
    {
        $historialDiacono = HistorialDiacono::find($id);
        return view('historiales_diacono.show', compact('historialDiacono'));
    }

    public function edit($id)
    {
        $historialDiacono = HistorialDiacono::find($id);
        return view('historiales_diacono.edit', compact('historialDiacono'));
    }

    public function update(Request $request, $id)
    {
        $historialDiacono = HistorialDiacono::find($id);
        $historialDiacono->update($request->all());
        return redirect()->route('historiales_diacono.index')->with('success', 'Historial Diacono updated successfully');
    }

    public function destroy($id)
    {
        $historialDiacono = HistorialDiacono::find($id);
        $historialDiacono->delete();
        return redirect()->route('historiales_diacono.index')->with('success', 'Historial Diacono deleted successfully');
    }
}

