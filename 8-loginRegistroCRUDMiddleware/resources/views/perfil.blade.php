@extends('maestra')

@section('titulo')
Perfil
@endsection

@section('estilos')
<style>
    body{
        background-color: #343d46;
    }
    .altura{
        height: 88vh;
    }
    .color{
        background-color: #b0aac0;
        border-radius: 30px;
    }
    p{
        margin: 0;
    }
</style>
@endsection

@section('contenido')
<main class="container-fluid">
    <div class="row ">
        <div class="col-md-4 mx-auto mt-5 d-flex flex-column justify-content-center altura">
            <div class="border py-4 px-5 color shadow-lg color">
                <h1 class="text-center display-4">Perfil</h1>
                <form name="formu" method="POST" action="editarPerfil">
                    {{ csrf_field() }}
                    <p>E-mail: {{$persona->getEmail()}}</p>
                    <p>Dni: {{$persona->getDni()}}</p>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nombre">Nombre: </label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$persona->getNombre()}}"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="apellidos">Apellidos: </label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{$persona->getApellidos()}}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ciudad">Ciudad: </label>
                        <input type="text" class="form-control" id="ciudad" name="ciudad" value="{{$persona->getCiudad()}}">
                    </div>
                    <input type="submit" class="w-100 mt-2 btn btn-dark" name="editarPerfil" value="Editar perfil"/>
                </form>
                <hr>
                <form name="formu" method="POST" action="cambiarPass">
                    {{ csrf_field() }}
                    <div class="form-group"
                         <label for="pass">Nueva contraseña: </label>
                        <input type="password" class="form-control" id="pass" name="pass" placeholder="Escribe aquí tu nueva contraseña" required />
                    </div>
                    @if (isset($mensaje)) 
                    <p>{{$mensaje}}</p>
                    @endif
                    <input type="submit" class="w-100 mt-2 btn btn-dark" name="cambiarPass" value="Cambiar contraseña"/>
                </form>
                <hr>
                <form name="formu" method="POST" action="irInicio">
                    {{ csrf_field() }}
                    <input type="submit" class="w-100 mt-2 btn btn-dark" name="volver" value="Volver"/>
                </form>
                <form name="formu" method="POST" action="cerrarSesion">
                    {{ csrf_field() }}
                    <input type="submit" class="w-100 mt-2 btn btn-dark" name="cerrarSesion" value="Cerrar sesión"/>
                </form>
            </div>
        </div> 
    </div>
</main>
@endsection
