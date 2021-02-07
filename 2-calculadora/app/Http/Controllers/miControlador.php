<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class miControlador extends Controller {

    public function realizarCalculo(Request $req) {
        $numero1 = $req->get('numero1');
        $numero2 = $req->get('numero2');
        $operacion = $req->get('operacion');
        $resultado = $req->get('resultado');
        $memory = $req->get('memory');

        if ($operacion != null) {
            if ($operacion == '+') {
                $rdo = $numero1 + $numero2;
            } else if ($operacion == '-') {
                $rdo = $numero1 - $numero2;
            } else if ($operacion == '*') {
                $rdo = $numero1 * $numero2;
            } else if ($operacion == '/') {
                $rdo = $numero1 / $numero2;
            }
        }

        if ($memory != null) {
            if ($memory == 'MG') {
                if (session()->has('memoria')) {
                    $rdo = session()->get('memoria');
                }else{
                    $rdo = "";
                }
            }
            if ($memory == 'MS') {
                if ($resultado != "") {
                    session()->put('memoria',$resultado);
                    $rdo = $resultado;
                }else{
                    $rdo = "";
                }
            }
        }
        
        return view('calculadora',['numero1'=>$numero1,'numero2'=>$numero2,'rdo'=>$rdo]);
    }

}
