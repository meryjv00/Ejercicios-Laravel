<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class miControlador extends Controller {

    function empezarJuego(Request $req) {
        session()->put('tabla', $req->get('n'));
        session()->put('intentos', 5);
        $datos = [
            'tabla' => $req->get('n'),
            'intentos' => 5
        ];
        return view('tabla', $datos);
    }

    //---------------------------------
    function comprobarTabla(Request $req) {
        $tabla = session()->get('tabla');
        $intentos = session()->get('intentos');
        $respuestas = $req->get('respuesta');
        $realizarIntento = $req->get('realizarIntento');
        $meRindo = $req->get('meRindo');

        //---REALIZAR INTENTO
        if ($realizarIntento != null) {
            $colores = array();
            $fallo = false;
            $ganado = false;
            $cont = 0;
            foreach ($respuestas as $i => $respuesta) {
                if ($tabla * ($i + 1) == $respuesta) {
                    $colores[$i] = '#bdcebe'; //Correcto
                    $cont++;
                } else {
                    $colores[$i] = '#eca1a6'; //Incorrecto
                    $fallo = true;
                }
            }
            //Ha fallado alguno
            if ($fallo) {
                $intentos--;
                session()->put('intentos', $intentos);
            }
            //Ha acertado todo
            if ($cont == 10) {
                $ganado = true;
            }
            //Se ha quedado sin intentos
            if ($intentos == 0) {
                return view('sinIntentos', ['tabla' => $tabla]);
            }

            $datos = [
                'tabla' => $tabla,
                'intentos' => $intentos,
                'respuestas' => $respuestas,
                'colores' => $colores,
                'ganado' => $ganado
            ];

            return view('tabla', $datos);
        }

        //---ME RINDO
        if ($meRindo != null) {
            return view('sinIntentos', ['tabla' => $tabla]);
        }
    }

}
