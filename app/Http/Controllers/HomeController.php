<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diacono; // Import the Diacono model
use Carbon\Carbon;
use App\Models\Parroquia;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Obtener todos los diáconos
        $diaconos = Diacono::all();
        
        // Calcular el próximo cumpleaños más cercano
        $nombrecumpleanero = null;
        $proximoCumpleanos = null;
        $cumpleanerosHoy = collect(); // Para almacenar los cumpleañeros de hoy
        
        $hoy = Carbon::today();
        foreach ($diaconos as $diacono) {
            // Verificar si el diácono está fallecido
            if ($diacono->IndicadorDefuncion != 1) {
                $cumpleanos = Carbon::createFromFormat('Y-m-d', $diacono->FechaNacimiento);
                $cumpleanos->year = $hoy->year;
                if ($cumpleanos->lt($hoy)) {
                    $cumpleanos->year = $hoy->year + 1;
                }
                if (!$proximoCumpleanos || $cumpleanos->lt($proximoCumpleanos)) {
                    $proximoCumpleanos = $cumpleanos;
                    $nombrecumpleanero = $diacono->Nombre;
                }
            }
        } 
    
        // Obtener el total de diáconos en el sistema
        $totalDiaconos = Diacono::count();
        $totalParroquia = Parroquia::count();


        // Ruta del archivo Excel
        $excelFile = public_path('templates/Salmos y Proverbios.xlsx');

        // Cargar el archivo Excel
        $spreadsheet = IOFactory::load($excelFile);

        // Hoja de trabajo para los salmos (hoja 1)
        $sheetSalmos = $spreadsheet->getSheet(0);
        $tituloTarjeta1 = $sheetSalmos->getCell('B1')->getValue();

        // Hoja de trabajo para los salmos (hoja 2)
        $sheetSalmos2 = $spreadsheet->getSheet(1);
        $tituloTarjeta2 = $sheetSalmos2->getCell('B1')->getValue();

        // Hoja de trabajo para los proverbios (hoja 3)
        $sheetProverbios = $spreadsheet->getSheet(2);
        $tituloTarjeta3 = $sheetProverbios->getCell('B1')->getValue();


        // Obtener la cantidad de filas de cada hoja
        $totalFilasSalmos = $sheetSalmos->getHighestRow();
        $totalFilasProverbios = $sheetProverbios->getHighestRow();

        // Seleccionar un salmo aleatorio no vacío
        do {
            $salmoAleatorioRow = rand(2, $totalFilasSalmos);
            $salmoAleatorioNumero = $sheetSalmos->getCell('A' . $salmoAleatorioRow)->getValue();
            $salmoAleatorio = $sheetSalmos->getCell('B' . $salmoAleatorioRow)->getValue();
        } while (empty($salmoAleatorio));

        do {
            $salmoAleatorioRow2 = rand(2, $totalFilasSalmos);
            $salmoAleatorioNumero2 = $sheetSalmos2->getCell('A' . $salmoAleatorioRow2)->getValue();
            $salmoAleatorio2 = $sheetSalmos2->getCell('B' . $salmoAleatorioRow2)->getValue();
        } while (empty($salmoAleatorio2));

        // Seleccionar un proverbio aleatorio no vacío
        do {
            $proverbioAleatorioRow = rand(2, $totalFilasProverbios);
            $proverbioAleatorioNumero = $sheetProverbios->getCell('A' . $proverbioAleatorioRow)->getValue();
            $proverbioAleatorio = $sheetProverbios->getCell('B' . $proverbioAleatorioRow)->getValue();
        } while (empty($proverbioAleatorio));


        // Pasar los datos al frontend
        return view('welcome', [
            'proximoCumpleanos' => $proximoCumpleanos, 
            'nombrecumpleanero' => $nombrecumpleanero, 
            'cumpleanerosHoy' => $cumpleanerosHoy, 
            'totalDiaconos' => $totalDiaconos,
            'totalParroquia' => $totalParroquia,
            'salmoAleatorio' => $salmoAleatorio,
            'proverbioAleatorio' => $proverbioAleatorio,
            'salmoAleatorioNumero' => $salmoAleatorioNumero,
            'proverbioAleatorioNumero' => $proverbioAleatorioNumero,
            'salmoAleatorio2' => $salmoAleatorio2,
            'salmoAleatorioNumero2' => $salmoAleatorioNumero2,
            'titulotarjeta1' => $tituloTarjeta1,
            'titulotarjeta2' => $tituloTarjeta2,
            'titulotarjeta3' => $tituloTarjeta3
        ]);
    }
    
    

}
