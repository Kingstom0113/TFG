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
            'carta_id' => 'required|exists:cartas,id'
        ]);

        $plato = new Plato([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'carta_id' => $request->carta_id
        ]);

        $plato->save();

        return response()->json($plato, 201);
    } catch (\Exception $e) {
        Log::error($e->getMessage());
        return response()->json(['message' => $e->getMessage()], 500);
    }    
}


}
