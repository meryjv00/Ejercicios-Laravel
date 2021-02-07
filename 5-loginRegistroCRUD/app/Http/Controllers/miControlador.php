<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clases\Persona;
use App\Clases\Coche;

//************* Con Query Builder ****************
class miControlador extends Controller {

    //-----------------LOGIN
    function login(Request $req) {
        $email = $req->get('email');
        $pass = md5($req->get('pass'));

        $personas = \DB::table('personas')
                ->where('Email', '=', $email)
                ->where('Pass', '=', $pass)
                ->get();

        //Login correcto
        if (count($personas) == 1) {
            //Usuario activado
            if ($personas[0]->Activo == 1) {
                $id = $personas[0]->IdPersona;
                $dni = $personas[0]->DNI;
                $email = $personas[0]->Email;
                $nombre = $personas[0]->Nombre;
                $apellidos = $personas[0]->Apellidos;
                $ciudad = $personas[0]->Ciudad;
                //Recuperar rol
                $roles = \DB::table('asignacionrolpersona')
                        ->where('IdPersona', '=', $id)
                        ->get();
                $rol = $roles[0]->IdRol;
                $persona = new Persona($id, $dni, $email, $nombre, $apellidos, $ciudad, 1, $rol);
                session()->put('persona', $persona);
                return view('inicio', ['persona' => $persona]);
            } else { //Usuario desactivado
                return view('login', ['mensaje' => 'Usuario desactivado, contacte con un administrador']);
            }
        } else { //Login incorrecto
            return view('login', ['mensaje' => 'Usuario o contraseña incorrectos']);
        }
    }

    //-----------------REGISTRO
    function registro(Request $req) {
        $this->registrarUsuario($req);
        return view('login', ['mensaje' => 'Cuenta creada']);
    }

    private function registrarUsuario(Request $req) {
        $email = $req->get('email');
        $pass = md5($req->get('pass'));
        $dni = $req->get('dni');
        $nombre = $req->get('nombre');
        $apellidos = $req->get('apellidos');
        $ciudad = $req->get('ciudad');

        //Obtener último idPersona
        $idPersona = \DB::table('personas')
                ->max('idPersona');
        $idPersona++;

        //Insertar usuario
        \DB::table('personas')->insert(
                ['IdPersona' => $idPersona, 'DNI' => $dni, 'Pass' => $pass, 'Email' => $email, 'Nombre' => $nombre,
                    'Apellidos' => $apellidos, 'Ciudad' => $ciudad, 'Activo' => 0]
        );
        //Insertar rol
        \DB::table('asignacionrolpersona')->insert(
                ['IdPersona' => $idPersona, 'IdRol' => 1]
        );
    }

    public function insertarDatosFake() {
        $fak = \Faker\Factory::create('es_ES');
        //$fak->dni - $fak->email - $fak->firstName - $fak->lastName - $fak->city - $fak->address - $fak->text - $fak->company - $fak->password
        //Obtener último idPersona
        $idPersona = \DB::table('personas')
                ->max('idPersona');
        $idPersona++;
        //Insertar usuario
        \DB::table('personas')->insert(
                ['IdPersona' => $idPersona, 'DNI' => $fak->dni, 'Pass' => md5('Chubaca2020'), 'Email' => $fak->email, 'Nombre' => $fak->firstName,
                    'Apellidos' => $fak->lastName, 'Ciudad' => $fak->city, 'Activo' => 0]
        );
        //Insertar rol
        \DB::table('asignacionrolpersona')->insert(
                ['IdPersona' => $idPersona, 'IdRol' => 1]
        );
    }

    //-----------------EDITAR PERFIL
    function editarPerfil(Request $req) {
        $persona = session()->get('persona');
        $nombre = $req->get('nombre');
        $apellidos = $req->get('apellidos');
        $ciudad = $req->get('ciudad');

        $persona->setNombre($nombre);
        $persona->setApellidos($apellidos);
        $persona->setCiudad($ciudad);
        session()->put('persona', $persona);

        \DB::table('personas')
                ->where('IdPersona', $persona->getId())
                ->update(['Nombre' => $nombre, 'Apellidos' => $apellidos, 'Ciudad' => $ciudad]);
        return view('perfil', ['persona' => $persona]);
    }

    //-----------------CAMBIAR CONTRASEÑA
    function cambiarPass(Request $req) {
        $persona = session()->get('persona');
        $nuevaPass = md5($req->get('pass'));
        \DB::table('personas')
                ->where('IdPersona', $persona->getId())
                ->update(['Pass' => $nuevaPass]);
        return view('perfil', ['persona' => $persona, 'mensaje' => 'Contraseña actualizada correctamente']);
    }

    //-----------------IR CRUD
    function cargarCRUD() {
        $personas = $this->cargarUsuarios();
        return view('crud', ['personas' => $personas]);
    }

    private function cargarUsuarios() {
        //Cargar usuarios
        $personas = \DB::table('personas')
                ->get();
        $personasA = array();
        foreach ($personas as $i => $persona) {
            $id = $persona->IdPersona;
            $dni = $persona->DNI;
            $email = $persona->Email;
            $nombre = $persona->Nombre;
            $apellidos = $persona->Apellidos;
            $ciudad = $persona->Ciudad;
            $activo = $persona->Activo;
            //Recuperar rol
            $roles = \DB::table('asignacionrolpersona')
                    ->where('IdPersona', '=', $id)
                    ->get();
            $rol = $roles[0]->IdRol;
            $persona = new Persona($id, $dni, $email, $nombre, $apellidos, $ciudad, $activo, $rol);
            $personasA[] = $persona;
        }
        session()->put('personas', $personasA);
        return $personasA;
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
            \DB::table('asignacionrolpersona')
                    ->where('IdPersona', $personaS->getId())
                    ->update(['IdRol' => $personaS->getRol()]);
        }
        //Editar activo
        if ($req->get($pos) == 'editarActivo') {
            //Obtener el estado actual, para poner el contrario
            if ($personaS->getActivo() == 1) {
                $personaS->setActivo(0);
            } else {
                $personaS->setActivo(1);
            }
            \DB::table('personas')
                    ->where('IdPersona', $personaS->getId())
                    ->update(['Activo' => $personaS->getActivo()]);
        }

        //Editar datos usuario
        if ($req->get($pos) == 'editarUsuario') {
            $nombres = $req->get('nombre');
            $apellidos = $req->get('apellidos');
            $ciudades = $req->get('ciudad');

            $personaS->setNombre($nombres[$pos]);
            $personaS->setApellidos($apellidos[$pos]);
            $personaS->setCiudad($ciudades[$pos]);

            \DB::table('personas')
                    ->where('IdPersona', $personaS->getId())
                    ->update(['Nombre' => $personaS->getNombre(), 'Apellidos' => $personaS->getApellidos(), 'Ciudad' => $personaS->getCiudad()]);
        }

        //Borrar usuario
        if ($req->get($pos) == 'borrarUsuario') {
            \DB::table('personas')->where('idPersona', '=', $personaS->getId())->delete();
            unset($personas[$pos]);
        }
        return view('crud', ['personas' => $personas]);
    }

    //-----------------AÑADIR USUARIO MANUAL
    function crearUsuario(Request $req) {
        $this->registrarUsuario($req);
        $personas = $this->cargarUsuarios();
        return view('crud', ['personas' => $personas]);
    }

    //-----------------GENERAR USUARIO AL AZAR CON FAKE
    function generarUsuarios(Request $req) {
        $cont = $req->get('cont');
        $n = 0;
        while ($n < $cont) {
            $this->insertarDatosFake();
            $n++;
        }
        $personas = $this->cargarUsuarios();
        return view('crud', ['personas' => $personas]);
    }

    //-----------------VER PERFIL
    function perfil() {
        $persona = session()->get('persona');
        return view('perfil', ['persona' => $persona]);
    }

    //-----------------IR INICIO
    function irInicio() {
        $persona = session()->get('persona');
        return view('inicio', ['persona' => $persona]);
    }

    //-----------------IR CRUD
    function irCRUD() {
        $personas = session()->get('personas');
        return view('crud', ['personas' => $personas]);
    }

    //-----------------CERRAR SESION
    function cerrarSesion() {
        session()->forget('persona');
        return view('login');
    }

    //-----------------CARGAR ALQUILERES
    function cargarAlquileres() {
        $cochesDisponibles = $this->getCochesDisponibles();
        $cochesAlquilados = $this->getCochesAlquilados();

        return view('alquileres', ['cochesAlquilados' => $cochesAlquilados, 'cochesDisponibles' => $cochesDisponibles]);
    }

    function getCochesDisponibles() {
        $cochesDisponiblesOB = array();
        $cochesDisponibles = \DB::table('coches')
                ->select('Matricula', 'Marca', 'Modelo', 'Disponible', 'Historico')
                ->where('Disponible', '=', 0)
                ->get();
        foreach ($cochesDisponibles as $i => $cocheD) {
            $coche = new Coche($cocheD->Matricula, $cocheD->Marca, $cocheD->Modelo, $cocheD->Disponible, $cocheD->Historico);
            $cochesDisponiblesOB[] = $coche;
        }
        session()->put('cochesDisponibles', $cochesDisponiblesOB);
        return $cochesDisponiblesOB;
    }

    function getCochesAlquilados() {
        $persona = session()->get('persona');
        $cochesAlquiladosOB = array();
        $cochesAlquilados = \DB::table('personas')
                ->join('alquilercoche', 'alquilercoche.IdPersona', '=', 'personas.IdPersona')
                ->join('coches', 'coches.Matricula', '=', 'alquilercoche.Matricula')
                ->select('coches.Matricula', 'Marca', 'Modelo', 'Disponible', 'Historico')
                ->where('alquilercoche.IdPersona', '=', $persona->getId())
                ->get();
        foreach ($cochesAlquilados as $i => $cocheA) {
            $coche = new Coche($cocheA->Matricula, $cocheA->Marca, $cocheA->Modelo, $cocheA->Disponible, $cocheA->Historico);
            $cochesAlquiladosOB[] = $coche;
        }
        session()->put('cochesAlquilados', $cochesAlquiladosOB);
        return $cochesAlquiladosOB;
    }

    //-----------------DEVOLUCIONES COCHE
    function gestionarDevoluciones(Request $req) {
        $cochesAlquilados = session()->get('cochesAlquilados');
        foreach ($cochesAlquilados as $i => $coche) {
            if ($req->get($i) != null) {
                $pos = $i;
            }
        }
        $cocheS = $cochesAlquilados[$pos];
        //Borrar alquiler de la tabla alquileres
        \DB::table('alquilercoche')
                ->where('Matricula', '=', $cocheS->getMatricula())
                ->delete();

        //Modificar estado disponible del coche
        \DB::table('coches')
                ->where('Matricula', $cocheS->getMatricula())
                ->update(['Disponible' => 0]);

        //Recuperar los coches de nuevo para mantener mismo orden array
        $cochesDisponibles = $this->getCochesDisponibles();
        $cochesAlquiladoss = $this->getCochesAlquilados();

        return view('alquileres', ['cochesAlquilados' => $cochesAlquiladoss, 'cochesDisponibles' => $cochesDisponibles]);
    }

    //-----------------ALQUILAR COCHE
    function gestionarAlquileres(Request $req) {
        $persona = session()->get('persona');
        $cochesDisponibles = session()->get('cochesDisponibles');

        foreach ($cochesDisponibles as $i => $coche) {
            if ($req->get($i) != null) {
                $pos = $i;
            }
        }
        $cocheS = $cochesDisponibles[$pos];
        //Insertar alquiler
        \DB::table('alquilercoche')->insert(
                ['IdPersona' => $persona->getId(), 'Matricula' => $cocheS->getMatricula()]
        );

        //Obtener su historico para modificarlo posteriormente
        $historicos = \DB::table('coches')
                ->select('Historico')
                ->where('Matricula', '=', $cocheS->getMatricula())
                ->get();
        $historico = $historicos[0]->Historico;
        $historico++;

        //Modificar estado disponible del coche
        \DB::table('coches')
                ->where('Matricula', $cocheS->getMatricula())
                ->update(['Disponible' => 1, 'Historico' => $historico]);

        //Recuperar los coches de nuevo para mantener mismo orden array
        $cochesAlquilados = $this->getCochesAlquilados();
        $cochesDisponibless = $this->getCochesDisponibles();

        return view('alquileres', ['cochesAlquilados' => $cochesAlquilados, 'cochesDisponibles' => $cochesDisponibless]);
    }

    //-----------------CARGAR CRUD COCHES
    function cargarCRUDcoches() {
        $coches = $this->cargarCoches();
        return view('crudCoches', ['coches' => $coches]);
    }

    function cargarCoches() {
        //Cargar usuarios
        $coches = \DB::table('coches')
                ->get();
        session()->put('coches', $coches);
        return $coches;
    }

    //-------------------GESTIONAR COCHES (EDITAR Y ELIMINAR)
    function gestionarCoches(Request $req) {
        $coches = session()->get('coches');
        foreach ($coches as $i => $coche) {
            if ($req->get($i) != null) {
                $pos = $i;
            }
        }
        $cocheS = $coches[$pos];

        //Editar datos coche
        if ($req->get($pos) == 'editarCoche') {
            $matriculas = $req->get('matricula');
            $marcas = $req->get('marca');
            $modelos = $req->get('modelo');
            $historicos = $req->get('historico');

            \DB::table('coches')
                    ->where('Matricula', $cocheS->Matricula)
                    ->update(['Matricula' => $matriculas[$pos], 'Marca' => $marcas[$pos], 'Modelo' => $modelos[$pos], 'Historico' => $historicos[$pos]]);
        }

        //Borrar coche
        if ($req->get($pos) == 'borrarCoche') {
            \DB::table('coches')->where('Matricula', '=', $cocheS->Matricula)->delete();
        }

        $cochesAct = $this->cargarCoches();
        return view('crudCoches', ['coches' => $cochesAct]);
    }
    
    //---------------CREAR COCHE
    function crearCoche(Request $req) {
        $matricula = $req->get('matricula');
        $marca = $req->get('marca');
        $modelo = $req->get('modelo');

        //Insertar coche
        \DB::table('coches')->insert(
                ['Matricula' => $matricula, 'Marca' => $marca, 'Modelo' => $modelo, 'Disponible' => 0, 'Historico' => 0]
        );
        
        $cochesAct = $this->cargarCoches();
        return view('crudCoches', ['coches' => $cochesAct]);
    }

}
