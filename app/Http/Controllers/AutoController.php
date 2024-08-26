<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use Illuminate\Http\Request;

class AutoController extends Controller
{
    public function CrearAuto()
    {
        $marca = 'Ford';
        $modelo = 'Mustang';
        $anio = 2018;
        $color = 'Negro';
        $precio = 35000.00;
        $activo = false;


        $autos = Auto::create([
            'marca' => $marca,
            'modelo' => $modelo,
            'anio' => $anio,
            'color' => $color,
            'precio' => $precio,
            'activo' => $activo,
        ]);

        return response()->json(['message' => 'Auto creado correctamente', 'autos' => $autos]);
    }

    public function BuscarAuto($id)
    {
        $auto = Auto::find($id);
        if ($auto) {
            return response()->json($auto);
        }
        return response()->json(['message' => 'Auto no encontrado'], 404);
    }

    public function ModificarAuto($id)
    {
        $auto = Auto::find($id);

        if ($auto) {
            $auto->update([
                'modelo' => 'Camry',
                'anio' => 2021,
                'color' => 'Azul',
                'precio' => 25000.00,
                'activo' => false,
            ]);

            return response()->json(['message' => 'Auto actualizado correctamente', 'auto' => $auto]);
        }

        return response()->json(['message' => 'Auto no encontrado'], 404);
    }

    public function MostrarAutos()
    {
        $autos = Auto::all();
        return response()->json($autos);
    }

    public function EliminarAuto($id)
    {
        $auto = Auto::find($id);
        if ($auto) {
            $auto->delete();
            return response()->json(['message' => 'Auto eliminado correctamente']);
        }
        return response()->json(['message' => 'Auto no encontrado'], 404);
    }
}
