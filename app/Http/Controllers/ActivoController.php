<?php

namespace App\Http\Controllers;

use App\Models\Activo;
use Illuminate\Http\Request;


class ActivoController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'serial_number' => 'required|string|unique:activos|max:255',
            'description' => 'nullable|string',
            'details' => 'nullable|array', // Valida que 'details' sea un array
        ]);

        $activo = Activo::create($validated);

        return response()->json($activo, 201);
    }

    public function update(Request $request, $id)
    {
        $activo = Activo::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'type' => 'sometimes|required|string|max:255',
            'serial_number' => 'sometimes|required|string|max:255|unique:activos,serial_number,' . $id,
            'description' => 'nullable|string',
            'details' => 'nullable|array', 
        ]);

        $activo->update($validated);

        return response()->json($activo);
    }

    public function index()
    {
        $activos = Activo::all();
       
        return response()->json($activos);
    }

   
public function destroy($id)
{
    $activo = Activo::find($id);

    if (!$activo) {
        return response()->json(['message' => 'Activo no encontrado'], 404);
    }

    $activo->delete();

    return response()->json(['message' => 'Activo eliminado exitosamente']);
}

}
