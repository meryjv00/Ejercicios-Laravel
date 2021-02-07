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
    i{
        color: white;
    }
    input.dni{
        width: 7rem;
    }
    input.email{
        width: 16.50rem;
    }
    input.nomb{
        width: 8rem;
    }
</style>
@endsection

@section('contenido')
<main class="container-fluid">
    <div class="row">
        <div class="col-md-11 mx-auto mt-5 mb-5 d-flex flex-column justify-content-center ">
            <div class="border py-4 px-5 color shadow-lg color">
                <h1 class="text-center display-4">CRUD usuarios</h1>
                <div class="row">
                    <div class="col-md-4 mx-auto card">
                        <div class="card-header">
                            Opciones
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="registroAdmin"><button type="button" class="w-100 btn btn-dark">Crear nuevo usuario</button></a>
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

                <form name="formu" method="POST" action="gestionarUsuarios">
                    {{ csrf_field() }}
                    <table class="table table-hover table-dark mt-4">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th class="text-center" scope="col">Dni</th>
                                <th class="text-center" scope="col">Email</th>
                                <th class="text-center" scope="col">Nombre</th>
                                <th class="text-center" scope="col">Apellidos</th>
                                <th class="text-center" scope="col">Ciudad</th>
                                <th class="text-center" colspan="4" scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($personas as $i => $persona) 
                            <tr>

                                <td>{{$persona->getId()}}</td>
                                <td>
                                    <input type="text" name="dni[]" class="form-control dni" value="{{$persona->getDni()}}" disabled/>
                                </td>
                                <td>
                                    <input type="text" name="email[]" class="form-control email" value="{{$persona->getEmail()}}" disabled/>
                                </td> 
                                <td>
                                    <input type="text" name="nombre[]" class="form-control nomb" value="{{$persona->getNombre()}}"/>
                                </td> 
                                <td>
                                    <input type="text" name="apellidos[]" class="form-control nomb" value="{{$persona->getApellidos()}}"/>
                                </td> 
                                <td>
                                    <input type="text" name="ciudad[]" class="form-control" value="{{$persona->getCiudad()}}"/>
                                </td>

                                <td>
                                    @if ($persona->getRol() == 1)
                                    <button type="submit" class="w-100 btn bg-info" name="{{$i}}" value="editarRol">
                                        <i class="fas fa-user"></i>
                                    </button>
                                    @else 
                                    <button type="submit" class="w-100 btn bg-warning" name="{{$i}}" value="editarRol">
                                        <i class="fas fa-user-cog"></i>
                                    </button>
                                    @endif
                                </td>
                                <td>
                                    @if ($persona->getActivo() == 0) 
                                    <button type="submit" class="w-100 btn bg-danger" name="{{$i}}" value="editarActivo">
                                        <i class="fas fa-check-circle"></i>
                                    </button>
                                    @else
                                    <button type="submit" class="w-100 btn bg-success" name="{{$i}}" value="editarActivo">
                                        <i class="fas fa-check-circle"></i>
                                    </button>
                                    @endif
                                </td> 
                                <td>
                                    <button type="submit" class="w-100 btn bg-secondary" name="{{$i}}" value="editarUsuario">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                </td>
                                <td>
                                    <button type="submit" class="w-100 btn bg-secondary" name="{{$i}}" value="borrarUsuario">
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
