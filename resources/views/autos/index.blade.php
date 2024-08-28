<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
        <h1> Lista de Autos</h1>
        <a href="{{url('ver_formulario')}}" class="btn btn-primary">Nuevo</a>
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
                    <th>Acción</th>
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
                    <td>
                        <button class="btn btn-warning">Editar</button>
                        <button class="btn btn-danger">Eliminar</button>
                    </td>
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