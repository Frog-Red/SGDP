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
        return view('diaconos.index', compact('diaconos'));
    }

    public function create()
    {
        return view('diaconos.create');
    }

    public function store(Request $request)
    {
       
        // Exclude _token from the request data
        $data = $request->except('_token');

        // Create a new Diacono instance and save it to the database
        Diacono::create($data);

        // Redirect or do something else after saving...
        return redirect()->route('diaconos.index');
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
}
