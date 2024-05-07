<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plato;
use Illuminate\Support\Facades\Log;

class PlatoController extends Controller
{

    
    public function store(Request $request)
{
    try {
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'producto_ids' => 'required|array',
            'producto_ids.*' => 'exists:productos,id',
            'carta_id' => 'required|exists:cartas,id'
        ]);

        $plato = new Plato([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'carta_id' => $request->carta_id  // Asegúrate de recibir este campo desde el frontend
        ]);

        $plato->save();
        $plato->productos()->attach($request->producto_ids);

        return response()->json($plato, 201);
    } catch (\Exception $e) {
        Log::error($e->getMessage());
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

}
