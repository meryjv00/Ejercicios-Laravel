@extends('plantilla')

@section('titulo')
Inicio
@endsection

@section('estilos')
<style>
    body{
        background-color: #343d46;
    }
    .altura{
        height: 80vh;
    }
    .color{
        background-color: #f3e1d9;
        border-radius: 30px;
    }
</style>
@endsection

@section('contenido')
<main class="container-fluid">
    <div class="row ">
        <div class="col-md-4 mx-auto mt-5 d-flex flex-column justify-content-center altura">
            <div class="border py-5 px-5 color shadow-lg color">
                <h1 class="text-center display-4">Bienvenid@ <br> {{$persona->getNombre()}} {{$persona->getApellidos()}} </h1>
                <form name="formu" method="POST" action="cerrarSesion">
                    {{ csrf_field() }} 
                    <input type="submit" class="w-100 mt-2 btn btn-dark" name="cerrarSesion" value="Cerrar sesión"/>
                </form>
            </div>
        </div> 
    </div>
</main>
@endsection