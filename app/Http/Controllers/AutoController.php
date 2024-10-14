<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use Illuminate\Http\Request;

class AutoController extends Controller
{
    public function CrearAuto(Request $request)
    {

        //Validaciones
        $validacion = [
            'marca' => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'anio' => 'required|string|max:4',
            'color' => 'required|string|max:20',
            'precio' => 'required|string|max:9', //verificar tipo de dato
            'activo' => 'required|boolean'
        ];

        //mensaje personalizado
        $mensaje = [
            'marca.required' => 'El campo marca es obligatorio',
            'modelo.required' => 'El campo modelo es obligatorio'
        ];

        //validar datos
        $validar_datos = $request->validate($validacion, $mensaje);

        $autos = Auto::all();
        $autos = Auto::create([
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'anio' => $request->anio,
            'color' => $request->color,
            'precio' => $request->precio,
            'activo' => $request->activo,
        ]);
        // redirigir a la ruta MostrarAutos con un mensaje de éxito
        return redirect()->route('MostrarAutos')->with('success', 'auto creado correctamente');
    }

    public function MostrarFormulario()
    {
        return view('autos.formulario');
    }

    public function Desactivar($id)
    {
        $auto = Auto::find($id);
        if ($auto) {
            $auto->update(['activo' => 0]);
            return redirect()->back()->with('success', 'El auto ha sido desactivado correctamente');
        }
        return redirect()->back()->with('error', 'Auto no encontrado');
    }

    public function Activar($id)
    {
        Auto::where('id', $id)->update(['activo' => 1]);
        return redirect()->route('MostrarAutos')->with('success', 'El auto ha sido activado correctamente');
    }

    public function BuscarAuto($id)
    {
        $auto = Auto::find($id);
        if ($auto) {
            return response()->json($auto);
        }
        return response()->json(['message' => 'Auto no encontrado'], 404);
    }

    public function MostrarAutos(Request $request)
    {
        $buscar = $request->input('buscar');
        if ($buscar != null) {
            $autos = Auto::where('activo', '!=', null)
                ->where('modelo', $buscar)
                ->orderBy('marca', 'desc')
                ->paginate(5);
            return view('autos.index', compact('autos'));
        } else {
            $autos = Auto::where('activo', '!=', null)
                ->orderBy('marca', 'desc')
                ->paginate(5);
        }
        return view('autos.index', compact('autos'));
    }

    public function ModificarAuto(Request $request, $id)
    {
        $auto = Auto::find($id);

        if ($auto) {
            $auto->update([
                'marca' => $request->marca,
                'modelo' => $request->modelo,
                'anio' => $request->anio,
                'color' => $request->color,
                'precio' => $request->precio,
                'activo' => $request->activo,
            ]);

            return redirect()->route('MostrarAutos')->with('success', 'Auto actualizado correctamente');
        }

        return response()->json(['message' => 'Auto no encontrado'], 404);
    }

    public function EliminarAuto($id)
    {
        $auto = Auto::find($id);
        if ($auto && $auto->activo == 0) {
            $auto->delete();
            return redirect()->route('MostrarAutos')->with('success', 'Auto eliminado correctamente');
        }
        return redirect()->route('MostrarAutos')->with('error', 'Solo se pueden eliminar autos inactivos.');
    }
}
