<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Autos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <div class="container mt-4">
        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
        <h1> Lista de Autos</h1>
        <a href="{{url('MostrarFormulario')}}" class="btn btn-primary">Nuevo</a>
        <br>
        <br>
        <form action="{{url('MostrarAutos')}}" method="get" class="mb-4">
            <div class="input-group d-flex gap-3 align-items-center">
                <label for="buscar">Buscar:</label>
                <input type="text" name="buscar" id="buscar" class="form-control" placeholder="Buscar por Modelo" value="{{request()->get('buscar')}}">
                <button type="submit" class="btn btn-success">Buscar</button>
            </div>
        </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Color</th>
                    <th>Precio</th>
                    <th>Activo</th>
                    <th>Creado</th>
                    <th>Actualizado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($autos as $auto)
                <tr>
                    <td>{{$auto->id}}</td>
                    <td>{{$auto->marca}}</td>
                    <td>{{$auto->modelo}}</td>
                    <td>{{$auto->anio}}</td>
                    <td>{{$auto->color}}</td>
                    <td>{{$auto->precio}}</td>
                    @if($auto->activo == 1)
                    <td><span class="badge text-bg-primary">Sí</span></td>
                    @elseif($auto->activo == 0)
                    <td><span class="badge text-bg-warning">No</span></td>
                    @else
                    <td><span class="badge text-bg-danger">Error</span></td>
                    @endif
                    <td>{{$auto->created_at}}</td>
                    <td>{{$auto->updated_at}}</td>
                    @if ($auto->activo = '1')
                    <td>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal-{{$auto->id}}">
                            <span class="material-symbols-outlined"> edit </span>
                        </button>
                        <div class="modal fade" id="editModal-{{$auto->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('ModificarAuto', $auto->id)}}" method="post">
                                            @csrf
                                            @method('post')
                                            <div class="form-group">
                                                <label for="marca">Marca:</label>
                                                <input type="text" value="{{$auto->marca}}" name="marca" id="marca" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="modelo">Modelo:</label>
                                                <input type="text" value="{{$auto->modelo}}" name="modelo" id="modelo" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="anio">Año:</label>
                                                <input type="text" value="{{$auto->anio}}" name="anio" id="anio" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="color">Color:</label>
                                                <input type="text" value="{{$auto->color}}" name="color" id="color" class="form-control">color
                                            </div>
                                            <div class="form-group">
                                                <label for="precio">Precio:</label>
                                                <input type="number" value="{{$auto->precio}}" name="precio" id="precio" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="activo">Estado:</label>
                                                <select class="form-select" name="activo" id="activo">
                                                    <option value="1" {{$auto->activo==1? "selected":""}}>Activo</option>
                                                    <option value="0" {{$auto->activo==0? "selected":""}}>Inactivo</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    @else
                    <td>
                        <button type="button" class="btn btn-danger">
                            <span class="material-symbols-outlined"> block </span>
                        </button>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{$autos->links()}}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>