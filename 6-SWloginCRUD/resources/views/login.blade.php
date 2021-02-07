@extends('plantilla')

@section('titulo')
Inicia sesión
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
                <h1 class="text-center">Entrar</h1>
                <form name="formu" method="POST" action="entrar">
                    {{ csrf_field() }} 
                    <div class="form-group">
                        <label for="email">E-mail: </label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                    </div>
                    <div class="form-group">
                        <label for="pass">Contraseña: </label>
                        <input type="password" class="form-control" id="pass" name="pass" required>
                    </div>

                    @if (isset($mensaje)) 
                    <p>{{$mensaje}}</p>
                    @endif

                    <button type="submit" class="w-100 mb-2 btn btn-dark">Entrar</button>
                </form>
                <!--<a href="registro"><button type="button" class="w-100 btn btn-dark">Registrate</button></a>-->
            </div>
        </div> 
    </div>
</main>
@endsection
