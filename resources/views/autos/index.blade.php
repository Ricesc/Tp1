@extends('layouts.app')

@section('title', 'Lista de Autos')

@section('content')
        
        <!-- Título y botón para nuevo auto -->
        <h1>Lista de Autos</h1>
        <!-- Mensajes de éxito o error -->
        <x-alert />
        
        <a href="{{ url('MostrarFormulario') }}" class="btn btn-primary mb-3">Nuevo Auto</a>
        
        <!-- Formulario de búsqueda -->
        <form action="{{ url('MostrarAutos') }}" method="get" class="mb-4">
            <div class="input-group">
                <input type="text" name="buscar" id="buscar" class="form-control" placeholder="Buscar por Modelo" value="{{ request()->get('buscar') }}">
                <button type="submit" class="btn btn-success">Buscar</button>
            </div>
        </form>

        <!-- Tabla de autos -->
        <table class="table table-striped">
            <thead class="table-dark">
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
                    <td>{{ $auto->id }}</td>
                    <td>{{ $auto->marca }}</td>
                    <td>{{ $auto->modelo }}</td>
                    <td>{{ $auto->anio }}</td>
                    <td>{{ $auto->color }}</td>
                    <td>{{ $auto->precio }}</td>
                    <td>
                        <span class="badge {{ $auto->activo ? 'text-bg-primary' : 'text-bg-warning' }}">
                            {{ $auto->activo ? 'Sí' : 'No' }}
                        </span>
                    </td>
                    <td>{{ $auto->created_at }}</td>
                    <td>{{ $auto->updated_at }}</td>
                    <td>
                        <!-- Acciones dependiendo del estado del auto -->
                        @if($auto->activo)
                        <div class="d-flex gap-2">
                            <!-- Botón editar -->
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal-{{ $auto->id }}">
                                <span class="material-symbols-outlined">edit</span>
                            </button>
                            <!-- Botón desactivar -->
                            <form action="{{ route('Desactivar', $auto->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-warning">
                                    <span class="material-symbols-outlined">toggle_off</span>
                                </button>
                            </form>
                        </div>

                        <!-- Modal para editar auto -->
                        <div class="modal fade" id="editModal-{{ $auto->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Editar Auto</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('ModificarAuto', $auto->id) }}" method="POST">
                                            @csrf
                                            <!-- Campos del formulario -->
                                            <div class="mb-3">
                                                <label for="marca" class="form-label">Marca</label>
                                                <input type="text" name="marca" class="form-control" value="{{ $auto->marca }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="modelo" class="form-label">Modelo</label>
                                                <input type="text" name="modelo" class="form-control" value="{{ $auto->modelo }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="anio" class="form-label">Año</label>
                                                <input type="text" name="anio" class="form-control" value="{{ $auto->anio }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="color" class="form-label">Color</label>
                                                <input type="text" name="color" class="form-control" value="{{ $auto->color }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="precio" class="form-label">Precio</label>
                                                <input type="number" name="precio" class="form-control" value="{{ $auto->precio }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="activo" class="form-label">Estado</label>
                                                <select name="activo" class="form-select" required>
                                                    <option value="1" {{ $auto->activo ? 'selected' : '' }}>Activo</option>
                                                    <option value="0" {{ !$auto->activo ? 'selected' : '' }}>Inactivo</option>
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
                        @else
                        <div class="d-flex gap-2">
                            <!-- Botón activar -->
                            <form action="{{ route('Activar', $auto->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-secondary">
                                    <span class="material-symbols-outlined">toggle_on</span>
                                </button>
                            </form>
                            <!-- Botón eliminar -->
                            <form action="{{ route('EliminarAuto', $auto->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <span class="material-symbols-outlined">delete</span>
                                </button>
                            </form>
                        </div>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginación -->
        <div class="d-flex justify-content-between align-items-center">
            <p>Mostrando {{ $autos->firstItem() }} a {{ $autos->lastItem() }} de {{ $autos->total() }} autos</p>
            {{ $autos->links() }}
        </div>
    </div>
    @endsection
