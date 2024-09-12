<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <h1>Formulario de Registro</h1>
        <form action="/CrearAuto" method="post">
            @csrf
            <div class="form-group">
                <label for="marca" class="form-label">Marca</label>
                <input class="form-control" type="text" id="marca" name="marca">
            </div>
            <div class="form-group">
                <label for="modelo" class="form-label">Modelo</label>
                <input class="form-control" type="text" id="modelo" name="modelo">
            </div>
            <div class="form-group">
                <label for="anio" class="form-label">Año</label>
                <input class="form-control" type="number" id="anio" name="anio">
            </div>
            <div class="form-group">
                <label for="color" class="form-label">Color</label>
                <input class="form-control" type="text" id="color" name="color">
            </div>
            <div class="form-group">
                <label for="precio" class="form-label">Precio</label>
                <input class="form-control" type="number" id="precio" name="precio">
            </div>
            <div class="form-group">
                <label for="activo" class="form-label">Estado</label>
                <select class="form-select" name="activo" id="activo">
                    <option value="" disabled selected>Seleccione una opción</option>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>
            <br>
            <button class="btn btn-primary">Registrar</button>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>