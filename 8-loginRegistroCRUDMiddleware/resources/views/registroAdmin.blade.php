@extends('maestra')

@section('titulo')
Registro 
@endsection

@section('estilos')
<style>
    body{
        background-color: #343d46;
    }
    .color{
        background-color: #b0aac0;
        border-radius: 30px;
    }
    p{
        font-size: 1.70rem;
    }
</style>
@endsection

@section('contenido')
<main class="container-fluid">
    <div class="row ">
        <div class="col-md-10 mx-auto mt-5 mb-5 d-flex flex-column justify-content-center ">
            <div class="border py-4 px-5 color shadow-lg color">
                <h1 class="text-center display-4 pb-4">Registrar nuevo usuario</h1>
                <div class="row">
                    <div class="col-md-4 mx-auto card">
                        <div class="card-header">
                            Opciones
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <form name="formu" method="POST" action="irInicio">
                                    {{ csrf_field() }}
                                    <input type="submit" class="w-100 mt-2 btn btn-dark" name="volver" value="Inicio"/>
                                </form>
                                <form name="formu" method="POST" action="irCRUD">
                                    {{ csrf_field() }}
                                    <input type="submit" class="w-100 mt-2 btn btn-dark" name="irCRUD" value="Volver"/>
                                </form>
                                <form name="formu" method="POST" action="cerrarSesion">
                                    {{ csrf_field() }}
                                    <input type="submit" class="w-100 mt-2 btn btn-dark" name="cerrarSesion" value="Cerrar sesión"/>
                                </form>
                            </li>
                            <li class="list-group-item"></li>
                        </ul>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-6 mx-auto border py-2">
                        <p>Generar usuario al azar</p>
                        <form name="formu" method="POST" action="generarUsuarios">
                            {{ csrf_field() }} 
                            <div class="form-group">
                                <label for="cont">Número de usuarios a generar: </label>
                                <input type="text" class="form-control" name="cont" value="1" required/> 

                            </div>
                            <input type="submit" class="w-100 mt-2 btn btn-dark" name="generar" value="Generar"/>
                        </form>
                    </div>
                    <div class="col-md-6 mx-auto border py-2">
                        <p>Crear usuario manual</p>
                        <form name="formu" method="POST" action="crearUsuario">
                            {{ csrf_field() }} 
                            <div class="form-group">
                                <label for="email">E-mail: </label>
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                            </div>
                            <div class="form-group">
                                <label for="pass">Contraseña: </label>
                                <input type="password" class="form-control" id="pass" name="pass" required>
                            </div>
                            <div class="form-group">
                                <label for="dni">Dni: </label>
                                <input type="text" class="form-control" id="dni" name="dni" required>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre: </label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="apellidos">Apellidos: </label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                            </div>
                            <div class="form-group">
                                <label for="ciudad">Ciudad: </label>
                                <input type="text" class="form-control" id="ciudad" name="ciudad" required>
                            </div>
                            @if (isset($mensaje)) 
                            <p>{{$mensaje}}</p>
                            @endif
                            <button type="submit" class="w-100 mb-2 btn btn-dark">Confirmar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</main>
@endsection

