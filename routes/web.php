<?php

use App\Http\Controllers\AutoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/CrearAuto', [AutoController::class, 'CrearAuto']);

Route::get('/BuscarAuto/{id}', [AutoController::class, 'BuscarAuto']);

Route::get('/ModificarAuto/{id}', [AutoController::class, 'ModificarAuto']);

Route::get('/MostrarAutos', [AutoController::class, 'MostrarAutos']);

Route::get('/EliminarAuto/{id}', [AutoController::class, 'EliminarAuto']);
