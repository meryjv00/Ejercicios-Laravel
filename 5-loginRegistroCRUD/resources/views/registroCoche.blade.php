@extends('maestra')

@section('titulo')
Registro coche
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
                <h1 class="text-center display-4 pb-4">Registrar nuevo coche</h1>
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
                        <form name="formu" method="POST" action="crearCoche">
                            {{ csrf_field() }} 
                            <div class="form-group">
                                <label for="matricula">Matricula: </label>
                                <input type="matricula" class="form-control" id="matricula" name="matricula" required>
                            </div>
                            <div class="form-group">
                                <label for="marca">Marca: </label>
                                <input type="text" class="form-control" id="marca" name="marca" required>
                            </div>
                            <div class="form-group">
                                <label for="modelo">Modelo: </label>
                                <input type="modelo" class="form-control" id="modelo" name="modelo" required>
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

