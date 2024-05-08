<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:30|unique:categories,name',
        ]);

        $category = new Categories([
            'name' => $request->name
        ]);

        $category->save();

        return response()->json(['message' => 'Categoría creada con éxito', 'category' => $category], 201);
    }

    public function index()
{
    $categories = Categories::all();
    return response()->json($categories);
}
}
