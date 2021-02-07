@extends('maestra')

@section('titulo')
Registro
@endsection

@section('estilos')
<style>
    body{
        background-color: #343d46;
    }
    .altura{
        height: 85vh;
    }
    .color{
        background-color: #b0aac0;
        border-radius: 30px;
    }
</style>
@endsection

@section('contenido')
<main class="container-fluid">
    <div class="row ">
        <div class="col-md-4 mx-auto mt-5 d-flex flex-column justify-content-center altura">
            <div class="border py-4 px-5 color shadow-lg color">
                <h1 class="text-center">Registrate</h1>
                <form name="formu" method="POST" action="registro">
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
                <a href="login"><button type="button" class="w-100 btn btn-dark">Volver</button></a>
            </div>
        </div> 
    </div>
</main>
@endsection
