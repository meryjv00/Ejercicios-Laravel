<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clases\Persona;

class miControlador extends Controller {

    //INICIAR SESION
    function entrar(Request $req) {
        $email = $req->get('email');
        $pass = ($req->get('pass'));

        $ch = curl_init("http://localhost:9090/EjemplosLaravel/6-SW_BDDD/public/realizarLogin?email=$email&pass=$pass");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        $response = curl_exec($ch);
        curl_close($ch);

        if ($response) {
            //Decode JSON
            $personas = json_decode($response, true);
            //Login correcto
            if (count($personas) == 1) {
                //Usuario activado
                if ($personas[0]["Activo"] == 1) {
                    $id = $personas[0]["IdPersona"];
                    $dni = $personas[0]["DNI"];
                    $email = $personas[0]["Email"];
                    $nombre = $personas[0]["Nombre"];
                    $apellidos = $personas[0]["Apellidos"];
                    $ciudad = $personas[0]["Ciudad"];
                    $activo = $personas[0]["Activo"];

                    //Recuperar rol
                    $rol = $this->recuperarRol($id);
                    if ($rol != -1) {
                        $persona = new Persona($id, $dni, $email, $nombre, $apellidos, $ciudad, $activo, $rol);
                        session()->put('persona', $persona);
                        if ($rol == 1) {
                            return view('inicio', ['persona' => $persona]);
                        } else {
                            $personas = $this->recuperarUsuarios();
                            if ($personas != -1) {
                                $personasA = array();
                                foreach ($personas as $i => $persona) {
                                    $id = $persona["IdPersona"];
                                    $dni = $persona["DNI"];
                                    $email = $persona["Email"];
                                    $nombre = $persona["Nombre"];
                                    $apellidos = $persona["Apellidos"];
                                    $ciudad = $persona["Ciudad"];
                                    $activo = $persona["Activo"];
                                    //Recuperar rol
                                    $rol = $this->recuperarRol($id);
                                    if ($rol != -1) {
                                        $persona = new Persona($id, $dni, $email, $nombre, $apellidos, $ciudad, $activo, $rol);
                                        $personasA[] = $persona;
                                    } else {
                                        return view('login', ['mensaje' => 'No se ha podido conectar con la base de datos']);
                                    }
                                }
                                session()->put('personas', $personasA);
                                return view('crud', ['personas' => $personasA]);
                            } else {
                                return view('login', ['mensaje' => 'No se ha podido conectar con la base de datos']);
                            }
                        }
                    } else {
                        return view('login', ['mensaje' => 'No se ha podido conectar con la base de datos']);
                    }
                } else {//Usuario desactivado
                    return view('login', ['mensaje' => 'Usuario desactivado, contacte con un administrador']);
                }
            } else {
                return view('login', ['mensaje' => 'Usuario o contraseña incorrectos']);
            }
        } else {
            return view('login', ['mensaje' => 'No se ha podido conectar con la base de datos']);
        }
    }

    //-----------------GESTIONAR USUARIOS (EDITAR Y ELIMINAR)
    function gestionarUsuarios(Request $req) {
        $personas = session()->get('personas');
        foreach ($personas as $i => $persona) {
            if ($req->get($i) != null) {
                $pos = $i;
            }
        }
        $personaS = $personas[$pos];

        //Editar rol
        if ($req->get($pos) == 'editarRol') {
            //Obtener rol actual, para poner el contrario
            if ($personaS->getRol() == 1) {
                $personaS->setRol(2);
            } else {
                $personaS->setRol(1);
            }
            $this->updateRol($personaS);
        }

        //Editar activo
        if ($req->get($pos) == 'editarActivo') {
            //Obtener el estado actual, para poner el contrario
            if ($personaS->getActivo() == 1) {
                $personaS->setActivo(0);
            } else {
                $personaS->setActivo(1);
            }
            $this->updateActivo($personaS);
        }

        //Editar datos usuario
        if ($req->get($pos) == 'editarUsuario') {
            $nombres = $req->get('nombre');
            $apellidos = $req->get('apellidos');
            $ciudades = $req->get('ciudad');

            $personaS->setNombre($nombres[$pos]);
            $personaS->setApellidos($apellidos[$pos]);
            $personaS->setCiudad($ciudades[$pos]);

            $this->updateDatosPersona($personaS);
        }

        //Borrar usuario
        if ($req->get($pos) == 'borrarUsuario') {
            $this->deletePersona($personaS);
            unset($personas[$pos]);
        }
        return view('crud', ['personas' => $personas]);
    }

    //-----------------CERRAR SESION
    function cerrarSesion() {
        session()->forget('persona');
        return view('login');
    }

    //-----------------FUNCIONES PRIVADAS
    //RECUPERAR ROL
    private function recuperarRol($id) {
        $ch = curl_init("http://localhost:9090/EjemplosLaravel/6-SW_BDDD/public/recuperarRol/$id");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        $response = curl_exec($ch);
        curl_close($ch);
        if ($response) {
            $rol = json_decode($response, true);
        } else {
            $rol = -1;
        }
        return $rol;
    }

    //RECUPERAR USUARIOS
    private function recuperarUsuarios() {
        //Recuperar usuarios
        $ch = curl_init("http://localhost:9090/EjemplosLaravel/6-SW_BDDD/public/recuperarUsuarios");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        $response = curl_exec($ch);
        curl_close($ch);
        if ($response) {
            $personas = json_decode($response, true);
        } else {
            $personas = -1;
        }
        return $personas;
    }

    //ACTUALIZAR ROL
    private function updateRol($personaS) {
        $id = $personaS->getId();
        $rol = $personaS->getRol();

        $ch = curl_init("http://localhost:9090/EjemplosLaravel/6-SW_BDDD/public/updateRol?$id&$rol");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        $response = curl_exec($ch);
        curl_close($ch);
    }

    //ACTUALIZAR ACTIVO
    private function updateActivo($personaS) {
        $id = $personaS->getId();
        $rol = $personaS->getRol();

        $ch = curl_init("http://localhost:9090/EjemplosLaravel/6-SW_BDDD/public/updateActivo?$id&$rol");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        $response = curl_exec($ch);
        curl_close($ch);
    }

    //ACTUALIZAR DATOS PERSONA
    private function updateDatosPersona($personaS) {
        $id = $personaS->getId();
        $nombre = $personaS->getNombre();
        $apellidos = $personaS->getApellidos();
        $ciudad = $personaS->getCiudad();
        
        $ch = curl_init("http://localhost:9090/EjemplosLaravel/6-SW_BDDD/public/updateDatosPersona?$id&$nombre&$apellidos&$ciudad");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        $response = curl_exec($ch);
        curl_close($ch);
    }
    
    //BORRAR USUARIO
    private function deletePersona($personaS) {
        $id = $personaS->getId();
        
        $ch = curl_init("http://localhost:9090/EjemplosLaravel/6-SW_BDDD/public/deletePersona?$id");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        $response = curl_exec($ch);
        curl_close($ch);
    }
}
