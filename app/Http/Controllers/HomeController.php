<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carta;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $cartas = auth()->user()->cartas;
        } else {
            $cartas = collect();
        }

        return view('home', compact('cartas'));
    }
}
