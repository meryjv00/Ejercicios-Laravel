@extends('maestra')

@section('titulo')
CRUD administrador
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
    .m0{
        margin: 0 !important;
    }
</style>
@endsection

@section('contenido')
<main class="container-fluid">
    <div class="row">
        <div class="col-md-11 mx-auto mt-5 mb-5 d-flex flex-column justify-content-center ">
            <div class="border py-4 px-5 color shadow-lg color">
                <h1 class="text-center display-4">Alquileres</h1>
                <div class="row">
                    <div class="col-md-4 mx-auto card">
                        <div class="card-header">
                            Opciones
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <form name="formu" method="POST" action="irInicio">
                                    {{ csrf_field() }}
                                    <input type="submit" class="w-100 mt-2 btn btn-dark" name="volver" value="Volver"/>
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

                <!--COCHES ALQUILADOS--->
                <form name="formu" method="POST" action="gestionarDevoluciones">
                    {{ csrf_field() }}
                    <h4 class="text-center mt-4">Coches alquilados por el usuario</h4>
                    <table class="col-md-8 mx-auto table table-hover table-dark mt-4">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Matricula</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">Historico</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cochesAlquilados as $i => $cocheA) 
                            <tr class="text-center">
                                <td>{{$cocheA->getMatricula()}}</td>
                                <td>{{$cocheA->getMarca()}}</td>
                                <td>{{$cocheA->getModelo()}}</td>
                                <td>{{$cocheA->getHistorico()}}</td>
                                <td>
                                    <input type="submit" class="w-100 mt-2 btn bg-white m0" name="{{$i}}" value="Devolver"/>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
                <!--COCHES DISPONIBLES--->
                <form name="formu" method="POST" action="gestionarAlquileres">
                    {{ csrf_field() }}
                    <h4 class="text-center mt-5">Coches disponibles</h4>
                    <table class="col-md-8 mx-auto table table-hover table-dark mt-4">
                        <thead>
                            <tr class="text-center"> 
                                <th scope="col">Matricula</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">Historico</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cochesDisponibles as $i => $cocheD) 
                            <tr class="text-center">
                                <td>{{$cocheD->getMatricula()}}</td>
                                <td>{{$cocheD->getMarca()}}</td>
                                <td>{{$cocheD->getModelo()}}</td>
                                <td>{{$cocheD->getHistorico()}}</td>
                                <td>
                                    <input type="submit" class="w-100 mt-2 btn bg-white m0" name="{{$i}}" value="Alquilar"/>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        </div> 
    </div>
</main>
@endsection
