<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class miControlador extends Controller {

    public function cargarIndice() {
        return view('indice');
    }

    //--------------------REQUEST (req): van a venir datos con el formu
    //--------------------{{ csrf_field() }}  obligatorio poner en la primera línea formulario
    public function cargarDatos(Request $req) {
        $nombre = $req->get('nombre');
        $edad = $req->get('edad'); //$nombre = $_REQUEST['nombre']
        $loqsea = 18;
        session()->put('ses',$loqsea); // $_SESSION[''] = $loqsea
        //var_dump($nombre);
        //dd($nombre);
        if ($nombre == 'Maria'){
            //Vector asociativo con los datos q quiero pasar
            $datos = [
                'nom' => $nombre,
                'ed' => $edad
            ];
            return view('exito',$datos);
        }else{
            return view('fracaso');
        }
    }

}
