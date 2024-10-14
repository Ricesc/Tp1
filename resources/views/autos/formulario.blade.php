@extends('layouts.app')

@section('title', 'Registrar Auto')

@section('content')
    <h1>Registrar Auto</h1>
    <x-alert />

    <form action="{{ url('CrearAuto') }}" method="post">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca" value="{{ old('marca') }}">
                @error('marca')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo" value="{{ old('modelo') }}">
                @error('modelo')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="anio" class="form-label">Año</label>
                <input type="text" class="form-control" id="anio" name="anio" value="{{ old('anio') }}">
                @error('anio')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="color" class="form-label">Color</label>
                <input type="text" class="form-control" id="color" name="color" value="{{ old('color') }}">
                @error('color')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="precio" class="form-label">Precio</label>
                <input type="text" class="form-control" id="precio" name="precio" value="{{ old('precio') }}">
                @error('precio')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="activo" class="form-label">Estado</label>
                <select class="form-select" name="activo" id="activo">
                    <option value="" disabled selected>Seleccione una opción</option>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
                @error('activo')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ url('MostrarAutos') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
