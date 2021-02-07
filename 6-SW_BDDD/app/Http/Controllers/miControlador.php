<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\RolPersona;

class miControlador extends Controller {

    function realizarLogin(Request $req) {
        $email = $req->get('email');
        $pass = md5($req->get('pass'));

        //QUERY BUILDER
//        $personas = \DB::table('personas')
//                ->where('Email', '=', $email)
//                ->where('Pass', '=', $pass)
//                ->get();
        //ELOQUENT
        $personas = Persona::where('Email', '=', $email)
                ->where('Pass', '=', $pass)
                ->get();
        return response()->json($personas);
    }

    function recuperarRol($id) {
        //QUERY BUILDER
//        $roles = \DB::table('asignacionrolpersona')
//                ->where('IdPersona', '=', $id)
//                ->get();
        //ELOQUENT
        $roles = RolPersona::where('IdPersona', '=', $id)
                ->get();

        $rol = $roles[0]->IdRol;
        return response()->json($rol);
    }

    function recuperarUsuarios() {
        //QUERY BUILDER
//        $personas = \DB::table('personas')
//                ->get();
        //ELOQUENT
        $personas = Persona::all();
        echo json_encode($personas);
    }

    function updateRol(Request $req) {
        $id = $req->get('id');
        $rol = $req->get('rol');

        //QUERY BUILDER
        \DB::table('asignacionrolpersona')
                ->where('IdPersona', $id)
                ->update(['IdRol' => $rol]);
    }

    function updateActivo(Request $req) {
        $id = $req->get('id');
        $rol = $req->get('rol');

        //QUERY BUILDER
        \DB::table('personas')
                ->where('IdPersona', $id)
                ->update(['Activo' => $rol]);
    }

    function updateDatosPersona(Request $req) {
        $id = $req->get('id');
        $nombre = $req->get('nombre');
        $apellidos = $req->get('apellidos');
        $ciudad = $req->get('ciudad');

        //QUERY BUILDER
        \DB::table('personas')
                ->where('IdPersona', $id)
                ->update(['Nombre' => $nombre, 'Apellidos' => $apellidos, 'Ciudad' => $ciudad]);
    }

    function deletePersona(Request $req) {
        $id = $req->get('id');
        //QUERY BUILDER
        \DB::table('personas')->where('idPersona', '=', $id)->delete();
    }

}
