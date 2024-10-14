<?php

use App\Http\Controllers\AutoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/CrearAuto', [AutoController::class, 'CrearAuto']);

Route::get('/MostrarAutos', [AutoController::class, 'MostrarAutos'])->name('MostrarAutos');

Route::get('/MostrarFormulario', [AutoController::class, 'MostrarFormulario']);

Route::get('/BuscarAuto/{id}', [AutoController::class, 'BuscarAuto']);

Route::post('/ModificarAuto/{id}', [AutoController::class, 'ModificarAuto'])->name('ModificarAuto');

Route::delete('/EliminarAuto/{id}', [AutoController::class, 'EliminarAuto'])->name('EliminarAuto');

Route::post('/Desactivar/{id}', [AutoController::class, 'Desactivar'])->name('Desactivar');

Route::post('/Activar/{id}', [AutoController::class, 'Activar'])->name('Activar');
