<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carta;
use App\Models\Producto;

class CartaController extends Controller
{
    public function index()
    {
        $cartas = auth()->user()->cartas;
        return view('home', compact('cartas'));
    }

    public function create()
    {
        return view('cartas.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
    ]);

    $carta = new Carta();
    $carta->nombre = $request->nombre;
    $carta->descripcion = $request->descripcion;
    $carta->user_id = auth()->id(); // Asegúrate de que el usuario esté autenticado
    $carta->save();

    return redirect()->route('home')->with('success', 'Carta creada exitosamente.');
}

public function update(Request $request, Carta $carta)
{
    $request->validate([
        'nombre' => 'required',
        'descripcion' => 'nullable',
    ]);

    $carta->update($request->all());

    return redirect()->route('home')->with('success', 'Carta actualizada correctamente.');
}



public function destroy(Carta $carta)
{
    $carta->delete();

    return redirect()->route('home')->with('success', 'Carta eliminada correctamente.');
}

public function show(Carta $carta)
{
    $productos = Producto::all();

    return view('cartas.carta', compact('carta', 'productos'));
}
}
