@extends('maestra')

@section('titulo')
CRUD coches
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
    i{
        color: white;
    }

</style>
@endsection

@section('contenido')
<main class="container-fluid">
    <div class="row">
        <div class="col-md-11 mx-auto mt-5 mb-5 d-flex flex-column justify-content-center ">
            <div class="border py-4 px-5 color shadow-lg color">
                <h1 class="text-center display-4">CRUD coches</h1>
                <div class="row">
                    <div class="col-md-4 mx-auto card">
                        <div class="card-header">
                            Opciones
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="registroCoche"><button type="button" class="w-100 btn btn-dark">Añadir nuevo coche</button></a>
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

                <form name="formu" method="POST" action="gestionarCoches">
                    {{ csrf_field() }}
                    <table class="table table-hover table-dark mt-4">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Matricula</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">Historico</th>
                                <th scope="col">Disponible</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coches as $i => $coche) 
                            <tr>
                                <td>
                                    <input type="text" name="matricula[]" class="form-control " value="{{$coche->Matricula}}" />
                                </td>
                                <td>
                                    <input type="text" name="marca[]" class="form-control " value="{{$coche->Marca}}" />
                                </td> 
                                <td>
                                    <input type="text" name="modelo[]" class="form-control " value="{{$coche->Modelo}}"/>
                                </td> 
                                <td>
                                    <input type="text" name="historico[]" class="form-control nomb" value="{{$coche->Historico}}"/>
                                </td> 
                                <td>
                                    @if ($coche->Disponible == 0) 
                                    <button type="button" class="w-100 btn bg-success text-white">
                                        Disponible
                                    </button>
                                    @else
                                    <button type="button" class="w-100 btn text-white bg-danger">
                                        Alquilado
                                    </button>
                                    @endif

                                </td> 
                                <td>
                                    <button type="submit" class="w-100  btn bg-secondary" name="{{$i}}" value="editarCoche">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                </td>
                                <td>
                                    <button type="submit" class="w-100 btn bg-secondary" name="{{$i}}" value="borrarCoche">
                                        <i class="fas fa-trash"></i>
                                    </button>
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
