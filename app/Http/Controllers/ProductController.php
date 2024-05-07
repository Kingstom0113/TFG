<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Producto;

class ProductController extends Controller
{
    public function index()
    {
        $productos = Producto::all(); // Recupera todos los productos
        return response()->json($productos);
    }
}
