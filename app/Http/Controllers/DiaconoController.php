<?php

namespace App\Http\Controllers;

// app/Http/Controllers/DiaconoController.php

use App\Models\Diacono;
use App\Models\Parroquia;
use App\Models\vicaria_ambiental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception;

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
    
        return redirect()->route('diaconos.index')->with('success', 'Diacono Actualizado exitosamente');
    }

    public function destroy($id)
    {
        $diacono = Diacono::find($id);
        $diacono->delete();
        return redirect()->route('diaconos.index')->with('success', 'Diacono Eliminado exitosamente');
    }
    
    public function deleteAll(Request $request) {
        $ids = $request->ids;
        Diacono::whereIn('id', $ids)->delete();
    
        return response()->json(['success' => 'Diáconos seleccionados borrados exitosamente.']);
    }

    public function consultas()
    {
        $diaconos = Diacono::all();
        return view('consultas', compact('diaconos'));
    }


    public function showCargaMasivaForm()
    {
        return view('diaconos.carga_masiva');
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
            foreach ($sheet->getRowIterator() as $row) {
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
                // Procesa los datos del diacono usando $rowData
                // Por ejemplo, puedes crear un nuevo Diacono utilizando los datos de cada fila
                if (!empty($rowData[0])) {
                    $diacono = new Diacono([
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
                        'estadoCivil' => $rowData[16], // Estado civil del diácono
                        'nombreEsposa' => $rowData[17]?? null, // Nombre de la esposa del diácono
                        'rutEsposa' => $rowData[18]?? null, // Rut de la esposa del diácono
                        'fechaNacimientoEsposa' => !empty($rowData[19]) ? $this->excelToDateTime($rowData[19])->format('Y-m-d') : null,
                        'fechaMatrimonio' => !empty($rowData[20]) ? $this->excelToDateTime($rowData[20])->format('Y-m-d') : null,
                        'fechaDefuncionEsposa' => !empty($rowData[21]) ? $this->excelToDateTime($rowData[21])->format('Y-m-d') : null,
                    ]);
                    
                    $diacono->save();
}
}

            return redirect()->route('diaconos.index')->with('success', 'Datos de diáconos importados correctamente.');
        } catch (QueryException $e) {
            // Captura excepción de QueryException (error de consulta SQL)
            return redirect()->route('diaconos.index')->with('error', 'Error al procesar el archivo Excel: ' . $e->getMessage());
        } catch (Exception $e) {
            // Captura cualquier otra excepción
            return redirect()->route('diaconos.index')->with('error', 'Error al procesar el archivo Excel: ' . $e->getMessage());
        }
    }

    public function downloadTemplate()
    {
        return response()->download(public_path('templates/diaconos_template.xlsx'));
    }


}
