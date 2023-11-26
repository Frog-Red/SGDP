<?php

namespace App\Http\Controllers;

// app/Http/Controllers/historial_diaconoController.php

use App\Models\historial_diacono;
use App\Models\Diacono; // Import the Diacono model
use App\Models\tipo_evento; // Import the tipo_evento model
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class historial_diaconoController extends Controller
{
    public function index()
    {
        $historial_diacono = historial_diacono::all();
        return view('historial_diacono.index', compact('historial_diacono'));
    }

    public function create()
    {
        $diaconos = Diacono::all();
        $tiposEvento = tipo_evento::all();
        return view('historial_diacono.create', compact('diaconos', 'tiposEvento'));
    }

    public function store(Request $request)
    {
        $historial_diacono = historial_diacono::create($request->all());
        return redirect()->route('historial_diacono.index')->with('success', 'Historial Diacono created successfully');
    }

    public function show($id)
    {
        $historial_diacono = historial_diacono::find($id);
        return view('historial_diacono.show', compact('historial_diacono'));
    }

    public function edit($id)
    {
        $diaconos = Diacono::all();
        $tiposEvento = tipo_evento::all();
        $historial_diacono = historial_diacono::find($id);
        return view('historial_diacono.edit', compact('historial_diacono', 'diaconos', 'tiposEvento'));
    }

    public function update(Request $request, $id)
    {
        $historial_diacono = historial_diacono::find($id);
        $historial_diacono->update($request->all());
        return redirect()->route('historial_diacono.index')->with('success', 'Historial Diacono updated successfully');
    }

    public function destroy($id)
    {
        $historial_diacono = historial_diacono::find($id);
        $historial_diacono->delete();
        return redirect()->route('historial_diacono.index')->with('success', 'Historial Diacono deleted successfully');
    }
}

