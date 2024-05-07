<?php

use App\Http\Controllers\CartaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlatoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::resource('cartas', CartaController::class)->middleware('auth');

Route::post('/cartas', [CartaController::class, 'store'])->name('cartas.store')->middleware('auth');

Route::get('/cartas/{carta}', [CartaController::class, 'show'])->name('cartas.show');

Route::post('/platos', [PlatoController::class, 'store']);

