<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clases\Conjunto;

class miControlador extends Controller {

    //Empezar juego
    function empezarJuego() {
        $conjunto1 = new Conjunto();
        $conjunto2 = new Conjunto();
        $conjuntos = array();
        $conjuntos[] = $conjunto1;
        $conjuntos[] = $conjunto2;
        session()->put('conjuntos', $conjuntos);

        return view('inicio', ['conjuntos' => $conjuntos]);
    }

    //Elegir conjunto a administrar
    function elegirConjunto(Request $req) {
        $conjuntos = session()->get('conjuntos');
        $posConjunto = $req->get('conjuntos'); //Devuelve la pos del vector conjuntos -> recogida del select
        //Obtenemos conjunto seleccionado
        $conjuntoSeleccionado = $conjuntos[$posConjunto];
        session()->put('conjuntoSeleccionado', $conjuntoSeleccionado);

        return view('conjunto', ['conjuntoSeleccionado' => $conjuntoSeleccionado]);
    }

    //Administrar conjunto
    //Añadir elemento
    function addElemento(Request $req) {
        $addElemento = $req->get('addElemento');
        $conjuntoSeleccionado = session()->get('conjuntoSeleccionado');
        if ($addElemento != null) {
            $elemento = $req->get('elemento');
            $conjuntoSeleccionado->addElemento($elemento);
        }
        session()->put('conjuntoSeleccionado', $conjuntoSeleccionado);
        return view('conjunto', ['conjuntoSeleccionado' => $conjuntoSeleccionado]);
    }

    //Borrar elemento
    function deleteElemento(Request $req) {
        $conjuntoSeleccionado = session()->get('conjuntoSeleccionado');
        for ($i = 0; $i < $conjuntoSeleccionado->size(); $i++) {
            //Se ha pulsado un botón "Borrar"
            if ($req->get($i) != null) {
                $conjuntoSeleccionado->deleteElemento($i);
            }
        }
        session()->put('conjuntoSeleccionado', $conjuntoSeleccionado);
        return view('conjunto', ['conjuntoSeleccionado' => $conjuntoSeleccionado]);
    }

    //Ver unión o intersección
    function unionInterseccion(Request $req) {
        $union = $req->get('union');
        $interseccion = $req->get('interseccion');
        $conjuntos = session()->get('conjuntos');
        //Ver unión
        if ($union != null) {
            $unionConjuntos = array();
            foreach ($conjuntos as $i => $conjunto) {
                //Recorremos los elementos
                for ($j = 0; $j < $conjunto->size(); $j++) {
                    $unionConjuntos[] = $conjunto->getElemento($j);
                }
            }
            return view('union', ['unionConjuntos' => $unionConjuntos]);
        }
        //Ver intersección
        if ($interseccion != null) {
            $interseccionConjuntos = array();
            $conjunto1 = $conjuntos[0];
            $conjunto2 = $conjuntos[1];
            $elemC1 = array();
            $elemC2 = array();
            //Guardamos los elementos del 1 conjunto
            for ($i = 0; $i < $conjunto1->size(); $i++) {
                $elemC1[] = $conjunto1->getElemento($i);
            }
            //Guardamos los elementos del 2 conjunto
            for ($j = 0; $j < $conjunto2->size(); $j++) {
                $elemC2[] = $conjunto2->getElemento($j);
            }
            
            //Añadimos los elementos iguales al vector interseccion
            foreach ($elemC1 as $z => $elemento1) {
                $coinciden = false;
                foreach ($elemC2 as $k => $elemento2) {
                    if($elemento1 == $elemento2 && !$coinciden){
                        $interseccionConjuntos[] = $elemento1;
                        unset($elemC2[$k]);
                        unset($elemC1[$z]);
                        $coinciden = true;
                    }
                }
            }
            return view('interseccion', ['interseccionConjuntos' => $interseccionConjuntos]);
        }
    }

    //Volver al inicio
    function volverInicio() {
        $conjuntos = session()->get('conjuntos');
        return view('inicio', ['conjuntos' => $conjuntos]);
    }

}
