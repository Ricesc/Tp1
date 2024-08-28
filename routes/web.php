<?php

use App\Http\Controllers\AutoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/CrearAuto', [AutoController::class, 'CrearAuto']);

Route::get('/MostrarAutos', [AutoController::class, 'MostrarAutos'])->name('MostrarAutos');

Route::get('/ver_formulario', [AutoController::class, 'ver_formulario']);

Route::get('/BuscarAuto/{id}', [AutoController::class, 'BuscarAuto']);

Route::get('/ModificarAuto/{id}', [AutoController::class, 'ModificarAuto']);

Route::get('/EliminarAuto/{id}', [AutoController::class, 'EliminarAuto']);
