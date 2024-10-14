<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function mostrarPacientes()
    {
        return view('pacientes.index');
    }

    public function MostrarFormulario()
    {
        return view('pacientes.formulario');
    }
}
