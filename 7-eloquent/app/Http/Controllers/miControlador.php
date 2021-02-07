<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Pedido;
use App\Models\Articulo;
use App\Models\AsignacionArticulos;

class miControlador extends Controller {

    function verUsuarios() {
        $pers = Usuario::all();
        $datos = [
            'pers' => $pers
        ];
        return view('vistapersonas', $datos);
    }

    function verPedidos() {
        $pedidos = Pedido::all();
        $datos = [
            'ped' => $pedidos
        ];
        return view('vistapedidos', $datos);
    }

    function verArticulos() {
        $articulos = Articulo::all();
        $datos = [
            'art' => $articulos
        ];
        return view('vistaarticulos', $datos);
    }

    function buscarUsuario(Request $req) {
        $dn = $req->get('DNIBuscado');
        //Opción A.
        //$pers = Usuario::where('dni', $dn)->first();
        //Opción B
        $pers = Usuario::find($dn);
        $datos = [
            'pers' => $pers
        ];
        return view('resultadoBusqueda', $datos);
    }

    function insertarUsuario(Request $req) {
        $dn = $req->get('DNI');
        $no = $req->get('Nombre');
        $tf = $req->get('Tfno');

        $pe = new Usuario;
        $pe->dni = $dn;
        $pe->nombre = $no;
        $pe->tfno = $tf;
        $mensaje = 'Inserción ok';
        try {
            $pe->save();
        } catch (\Exception $e) {
            $mensaje = 'Clave duplicada';
        }
        return view('resultadoInsercion', ['mens' => $mensaje]);
    }

    function verPedidosUsuario(Request $req) {
        $dn = $req->get('DNIBuscado');
        $pedidos = Pedido::where('dni', $dn)->get();
        $datos = [
            'ped' => $pedidos
        ];
        return view('vistaPedidosUsuario', $datos);
    }

    function verUsuariosConPedidos() {
        $usuarios = Pedido::with(['usuarios'])->get();

        $usuariosP = [];
        foreach ($usuarios as $us) {
            $usuariosP[] = [
                'dni' => $us->dni,
                'nombre' => $us->usuarios[0]->nombre, //String
                'tfno' => $us->usuarios[0]->tfno //String
            ];
        }
        $datos = [
            'pers' => $usuariosP
        ];

        return view('verpersonaspedidos', $datos);
    }

    function verArticulosPedidos() {
        $articulos = AsignacionArticulos::with(['pedidos', 'articulos'])->get();

        $articulosPedidos = [];
        foreach ($articulos as $art) {
            $articulosPedidos[] = [
                'numeroSerie' => $art->numeroSerie,
                'desc' => $art->articulos[0]->descripcion, //String
                'idPedido' => $art->id,
            ];
        }

        $datos = [
            'art' => $articulosPedidos
        ];
        return view('vistaarticulospedidos', $datos);
    }

    public function probarBelong() {
        $articulos = AsignacionArticulos::with(['pedidosBelong', 'articulosBelong'])->get();
        dd($articulos);
    }

}
