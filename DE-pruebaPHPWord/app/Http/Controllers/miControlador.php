<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class miControlador extends Controller {

    function generarWord(Request $req) {
        $unacosa = $req->get('unacosa');
        $otracosa = $req->get('otracosa');

//------------------------------------------------------------------ARCHIVO .docx
//        
//          $templateProcessor = new TemplateProcessor('word-template/anexo1_relacion_alumnos.docx');
//          $templateProcessor->setValue('unacosa', $unacosa);
//          $templateProcessor->setValue('otracosa', $otracosa);
//          //Guardar
//          $fileName = "DocumentoPrueba";
//          $templateProcessor->saveAs($fileName . '.docx');
//          return response()->download($fileName . '.docx')->deleteFileAfterSend(true);
//------------------------------------------------------------------ARCHIVO .xlsx
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('word-template/Anexo 6-Gastos_FCT_Alumnos.xlsx');
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A10', 'HOLA!');
        $writer = new Xlsx($spreadsheet);
        $writer->save("holaMundo.xlsx");
        return response()->download('holaMundo.xlsx')->deleteFileAfterSend(true);

//        $path = public_path('Libro1.csv');
//        $lines = file($path);
//        $utf8_lines = array_map('utf8_encode', $lines);
//        $array = array_map('str_getcsv', $utf8_lines);
//
//        for ($i = 0; $i < count($array); $i++) {
//            $valores = explode(";", $array[$i][0]);
//            \DB::table('chorradas')->insert(
//                    ['nombre' => utf8_decode($valores[0]), 'verbo' => utf8_decode($valores[1]), 'a' => $valores[2], 'comida' => $valores[3]]
//            );
//        }
//        die();
    }

}
