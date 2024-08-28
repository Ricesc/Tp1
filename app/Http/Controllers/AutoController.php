<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use Illuminate\Http\Request;

class AutoController extends Controller
{
    public function CrearAuto(Request $request)
    {
        $autos = Auto::create([
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'anio' => $request->anio,
            'color' => $request->color,
            'precio' => $request->precio,
            'activo' => $request->activo,
        ]);

        return redirect()->route('MostrarAutos')->with('success', 'auto creado correctamente');
    }

    public function ver_formulario()
    {
        return view('autos.formulario');
    }

    public function MostrarAutos()
    {
        $autos = Auto::where('activo', '!=', null)
            ->orderBy('marca', 'desc')
            ->paginate(5);

        return view('autos.index', compact('autos'));
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
