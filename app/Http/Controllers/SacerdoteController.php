<?php

namespace App\Http\Controllers;

use App\Models\Sacerdote;
use App\Models\Parroquia;
use App\Models\vicaria_ambiental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception;

class SacerdoteController extends Controller
{

    public function index()
    {
        $sacerdotes = Sacerdote::all();
        return view('sacerdotes.index', compact('sacerdotes'));
    }

    public function create()
    {      
        $vicaria_ambiental = vicaria_ambiental::all();
        $parroquias = Parroquia::all();
        return view('sacerdotes.create', compact('parroquias','vicaria_ambiental'));
    }
    

    public function store(Request $request)
    {
        // Exclude _token from the request data
        $data = $request->except('_token');

        // Create a new Sacerdote instance and save it to the database
        Sacerdote::create($data);

        // Redirect or do something else after saving...
        return redirect()->route('sacerdotes.index');
    }

    public function show($id)
    {
        $sacerdotes = Sacerdote::find($id);
        return view('sacerdotes.index', compact('sacerdotes'));
    }

    public function edit($id)
    {
        $sacerdote = Sacerdote::find($id);
        return view('sacerdotes.edit', compact('sacerdote'));
    }

    public function update(Request $request, $id)
    {
        $sacerdote = Sacerdote::find($id);
        
        // Exclude _token from the update fields
        $data = $request->except(['_token']);
    
        // Update the sacerdote with the remaining fields
        $sacerdote->update($data);
    
        return redirect()->route('sacerdotes.index')->with('success', 'Sacerdote Actualizado exitosamente');
    }

    public function destroy($id)
    {
        $sacerdote = Sacerdote::find($id);
        $sacerdote->delete();
        return redirect()->route('sacerdotes.index')->with('success', 'Sacerdote Eliminado exitosamente');
    }
    
    public function deleteAll(Request $request) {
        $ids = $request->ids;
        Sacerdote::whereIn('id', $ids)->delete();
    
        return response()->json(['success' => 'Diáconos seleccionados borrados exitosamente.']);
    }

    public function consultas()
    {
        $sacerdotes = Sacerdote::all();
        return view('consultas', compact('sacerdotes'));
    }


    public function showCargaMasivaForm()
    {
        return view('sacerdotes.carga_masiva');
    }
    private function excelToDateTime($excelTimestamp)
    {
        // Verificar si el valor es una cadena de caracteres
        if (is_string($excelTimestamp)) {
            // Crear un objeto DateTime a partir de la cadena de caracteres
            return new \DateTime($excelTimestamp);
        } else {
            // Convertir el valor de Excel a un objeto DateTime
            $days = floor($excelTimestamp);
            $partDay = $excelTimestamp - $days;
            $hms = 86400 * $partDay;
            $microseconds = (int) round(fmod($hms, 1) * 1000000);
            $hms = (int) floor($hms);
            $hours = intdiv($hms, 3600);
            $hms -= $hours * 3600;
            $minutes = intdiv($hms, 60);
            $seconds = $hms % 60;
    
            // Ajustar el período de tiempo de Excel al período de tiempo de Unix (desde 1900/01/01 hasta 1970/01/01)
            $unixEpoch = 25569; // Número de días entre 1900/01/01 y 1970/01/01
            $unixTimestamp = ($days - $unixEpoch) * 86400 + $hms;
    
            $dateTime = new \DateTime("@$unixTimestamp");
            $dateTime->setTimezone(new \DateTimeZone('UTC'));
    
            return $dateTime;
        }
    }
    
    
    
 public function import(Request $request)
    {
        
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        // Obtiene el archivo subido
        $file = $request->file('file');

        try {
            // Carga el archivo Excel
            $reader = IOFactory::createReader('Xlsx'); // o 'Xls' para archivos XLS
            $spreadsheet = $reader->load($file->path());
            $sheet = $spreadsheet->getActiveSheet();

            $isFirstRow = true; // Variable para controlar la primera fila

            // Recorre las filas del archivo Excel y procesa los datos
            foreach ($sheet->getRowIterator() as $rowNumber => $row) {
                // Ignora la primera fila que contiene los encabezados
                if ($isFirstRow) {
                    $isFirstRow = false; // Marca que ya se procesó la primera fila
                    continue; // Pasa a la siguiente iteración del bucle
                }
                // Obtiene las celdas de la fila actual
                $rowData = [];
                foreach ($row->getCellIterator() as $cell) {
                    $rowData[] = $cell->getValue();
                }
                // Procesa los datos del Sacerdote usando $rowData
                // Por ejemplo, puedes crear un nuevo Sacerdote utilizando los datos de cada fila
                if (!empty($rowData[0])) {
                    $sacerdote = new Sacerdote([
                        'nombre' => $rowData[0], // Nombre del diácono
                        'rut' => $rowData[1], // Rut del diácono
                        'estadoVigencia' => $rowData[2], // Estado de vigencia del diácono
                        'fechaNacimiento' => !empty($rowData[3]) ? $this->excelToDateTime($rowData[3])->format('Y-m-d') : null,
                        'fechaOrdenacion' => !empty($rowData[4]) ? $this->excelToDateTime($rowData[4])->format('Y-m-d') : null,
                        'lugarOrdenacion' => $rowData[5], // Lugar de ordenación del diácono
                        'nombreObispoOrdeno' => $rowData[6], // Nombre del obispo que ordenó al diácono
                        'profesionOficio' => $rowData[7]?? null, // Profesión u oficio del diácono
                        'parroquiaAsignada' => $rowData[8], // Parroquia asignada al diácono
                        'vicariaAmbientalAsignada' => $rowData[9], // Vicaría ambiental asignada al diácono
                        'direccionParticular' => $rowData[10]?? null, // Dirección particular del diácono
                        'telefonoCelular' => $rowData[11]?? null, // Teléfono celular del diácono
                        'telefonoFijo' => $rowData[12]?? null, // Teléfono fijo del diácono
                        'correoElectronico' => $rowData[13]?? null, // Correo electrónico del diácono
                        'indicadorDefuncion' => $rowData[14] === 'Fallecido' ? 1 : 0,
                        'fechaDefuncion' => !empty($rowData[15]) ? $this->excelToDateTime($rowData[15])->format('Y-m-d') : null,
                        'numeroDecreto' => $rowData[16]?? null, 
                    ]);
                    
                    $sacerdote->save();
}
}

            return redirect()->route('sacerdotes.index')->with('success', 'Datos de diáconos importados correctamente.');
        } catch (QueryException $e) {
            // Captura excepción de QueryException (error de consulta SQL)
            return redirect()->route('sacerdotes.index')->with('error', 'Error al procesar el archivo Excel en la fila ' . ($rowNumber ) . ': ' . $e->getMessage());
        } catch (Exception $e) {
            // Captura cualquier otra excepción
            return redirect()->route('sacerdotes.index')->with('error', 'Error al procesar el archivo Excel en la fila ' . ($rowNumber ) . ': ' . $e->getMessage());
        }
    }

    public function downloadTemplate()
    {
        return response()->download(public_path('templates/sacerdotes_template.xlsx'));
    }


}

