<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class miControlador extends Controller {

    public function realizarIntento(Request $req) {
        if (session()->has('nAdivina')) {
            $nAdivina = session()->get('nAdivina');
            $intentos = session()->get('intentos');
        } else {
            session()->put('intentos', 5);
            $nAdivina = rand(1, 100);
            session()->put('nAdivina', $nAdivina);
        }
        $numero = $req->get('numero');
        $intentos = session()->get('intentos');
        if ($intentos == 1) {
            //session()->put('mensaje', '¡¡Has perdido!!');
            return view('fracaso', ['mensaje' => 'Has perdido']);
        }
        while ($intentos > 1) {
            if ($numero > $nAdivina) {
                $intentos--;
                session()->put('intentos', $intentos);
                //session()->put('mensaje', 'Es menor');
                return view('portada', ['mensaje' => 'Es menor']);
            } else if ($numero < $nAdivina) {
                $intentos--;
                session()->put('intentos', $intentos);
                //session()->put('mensaje', 'Es mayor');
                return view('portada', ['mensaje' => 'Es mayor']);
            } else if ($numero == $nAdivina) {
                //session()->put('mensaje', '¡¡Has ganado!!');
                return view('exito', ['mensaje' => 'Has ganado']);
            }
        }
    }

}
