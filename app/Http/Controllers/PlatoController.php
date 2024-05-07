<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plato;

class PlatoController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required',
        'descripcion' => 'nullable',
        'precio' => 'required|numeric',
        'categoria_id' => 'required|exists:categorias,id',
    ]);

    $plato = Plato::create($request->all());

    return response()->json($plato, 201);
}
}
