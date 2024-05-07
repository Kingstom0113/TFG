<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showProfile()
{
    $user = Auth::user();  // Obtiene el usuario autenticado
    return view('profile', compact('user'));  // Pasa el usuario a la vista
}

public function updateName(Request $request)
{
    $request->validate(['name' => 'required|string|max:255']);
    $user = Auth::user();
    $user->name = $request->name;
    $user->save();

    return back()->with('success', 'Nombre actualizado correctamente.');
}

public function updateEmail(Request $request)
{
    $request->validate([
        'email' => 'required|email|max:255|unique:users,email,' . auth()->id()
    ]);

    $user = Auth::user();
    $user->email = $request->email;
    $user->save();

    return back()->with('success', 'Correo electrónico actualizado correctamente.');
}

public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required|password',
        'new_password' => 'required|string|min:8|confirmed'
    ]);

    $user = Auth::user();
    $user->password = Hash::make($request->new_password);
    $user->save();

    return back()->with('success', 'Contraseña actualizada correctamente.');
}

}
