<?php

namespace App\Http\Controllers;

// app/Http/Controllers/RolPastoralController.php

// app/Http/Controllers/tipo_eventoController.php

use App\Models\tipo_evento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class tipo_eventoController extends Controller
{
    public function index()
    {
        $tipo_evento = tipo_evento::all();
        return view('tipo_evento.index', compact('tipo_evento'));
    }

    public function create()
    {
        return view('tipo_evento.create');
    }

    public function store(Request $request)
    {
        $tipo_evento = tipo_evento::create($request->all());
        return redirect()->route('tipo_evento.index')->with('success', 'Tipo de Evento created successfully');
    }

    public function show($id)
    {
        $tipo_evento = tipo_evento::find($id);
        return view('tipo_evento.show', compact('tipo_evento'));
    }

    public function edit($id)
    {
        $tipo_evento = tipo_evento::find($id);
        return view('tipo_evento.edit', compact('tipo_evento'));
    }

    public function update(Request $request, $id)
    {
        $tipo_evento = tipo_evento::find($id);
        $tipo_evento->update($request->all());
        return redirect()->route('tipo_evento.index')->with('success', 'Tipo de Evento updated successfully');
    }

    public function destroy($id)
    {
        $tipo_evento = tipo_evento::find($id);
        $tipo_evento->delete();
        return redirect()->route('tipo_evento.index')->with('success', 'Tipo de Evento deleted successfully');
    }
}

