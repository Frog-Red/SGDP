<?php

namespace App\Http\Controllers;

// app/Http/Controllers/DiaconoController.php

use App\Models\Diacono;
use App\Models\Parroquia;
use App\Models\vicaria_ambiental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiaconoController extends Controller
{
    public function index()
    {
        $diaconos = Diacono::all();
        return view('diaconos.index', compact('diaconos'));
    }

    public function create()
    {      
        $vicaria_ambiental = vicaria_ambiental::all();
        $parroquias = Parroquia::all();
        return view('diaconos.create', compact('parroquias','vicaria_ambiental'));
    }
    
    

    public function store(Request $request)
    {
        $request->validate([
            'RutDiáconoPadre' => 'exists:diaconos,Rut',
            // Add other validation rules for other fields
        ]);
        // Exclude _token from the request data
        $data = $request->except('_token');

        // Create a new Diacono instance and save it to the database
        Diacono::create($data);

        // Redirect or do something else after saving...
        return redirect()->route('diaconos.index');
    }

    public function show($id)
    {
        $diaconos = Diacono::find($id);
        return view('diaconos.index', compact('diaconos'));
    }

    public function edit($id)
    {
        $diacono = Diacono::find($id);
        return view('diaconos.edit', compact('diacono'));
    }

    public function update(Request $request, $id)
    {
        $diacono = Diacono::find($id);
        
        // Exclude _token from the update fields
        $data = $request->except(['_token']);
    
        // Update the diacono with the remaining fields
        $diacono->update($data);
    
        return redirect()->route('diaconos.index')->with('success', 'Diacono updated successfully');
    }

    public function destroy($id)
    {
        $diacono = Diacono::find($id);
        $diacono->delete();
        return redirect()->route('diaconos.index')->with('success', 'Diacono deleted successfully');
    }
    public function consultas()
    {
        $diaconos = Diacono::all();
        return view('consultas', compact('diaconos'));
    }
    
}
