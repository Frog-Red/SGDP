<?php

namespace App\Http\Controllers;

// app/Http/Controllers/DiaconoController.php

use App\Models\Diacono;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiaconoController extends Controller
{
    public function index()
    {
        $diaconos = Diacono::all();
        return view('welcome', compact('diaconos'));
    }

    public function create()
    {
        return view('diaconos.create');
    }

    public function store(Request $request)
    {
        // Validate the data
        $request->validate([
            'nombre' => 'required|string',
            'rut' => 'required|string|unique:diaconos', // Assuming 'rut' should be unique in the 'diaconos' table
            'estadoVigencia' => 'required|string',
            'fechaNacimiento' => 'required|date',
            'fechaOrdenacion' => 'required|date',
            'lugarOrdenacion' => 'required|string',
            'nombreObispoOrdeno' => 'required|string',
            'profesionOficio' => 'required|string',
            'parroquiaAsignada' => 'nullable|string',
            'vicariaAmbientalAsignada' => 'nullable|string',
            'direccionParticular' => 'required|string',
            'telefonoCelular' => 'required|string',
            'telefonoFijo' => 'required|string',
            'correoElectronico' => 'required|email',
            'indicadorDefuncion' => 'nullable|string',
            'fechaDefuncion' => 'nullable|date',
            'estadoCivil' => 'required|string',
            'nombreEsposa' => 'nullable|string',
            'rutEsposa' => 'nullable|string',
            'fechaNacimientoEsposa' => 'nullable|date',
            'fechaMatrimonio' => 'nullable|date',
            'fechaDefuncionEsposa' => 'nullable|date',
        ]);

        // Exclude _token from the request data
        $data = $request->except('_token');

        // Create a new Diacono instance and save it to the database
        Diacono::create($data);

        // Redirect or do something else after saving...
        return redirect()->route('welcome');
    }

    public function show($id)
    {
        $diacono = Diacono::find($id);
        return view('diaconos.show', compact('diacono'));
    }

    public function edit($id)
    {
        $diacono = Diacono::find($id);
        return view('diaconos.edit', compact('diacono'));
    }

    public function update(Request $request, $id)
    {
        $diacono = Diacono::find($id);
        $diacono->update($request->all());
        return redirect()->route('diaconos.index')->with('success', 'Diacono updated successfully');
    }

    public function destroy($id)
    {
        $diacono = Diacono::find($id);
        $diacono->delete();
        return redirect()->route('diaconos.index')->with('success', 'Diacono deleted successfully');
    }
}
