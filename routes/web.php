<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImgController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\RegistrarEventoController;
include __DIR__.'/web/fer.php';

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {return view('home');})->name('home');

Route::get('/tienda',[TiendaController::class,'index'])->name('tienda');
Route::get('/publicacion/{producto:id}',[PublicacionController::class,'index'])->name('publicacion');


Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);

Route::post('/logout',[LogoutController::class,'store'])->name('logout');

Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store']);

Route::get('/user/{user:id}',[VendedorController::class,'index'])->name('vendedor');

Route::post('/img/{user:id}',[ImgController::class,'store'])->name('imagen.store');

Route::post('/producto/{user:id}',[ProductoController::class,'store'])->name('producto.crear');
Route::post('/delproducto/{user:id}',[ProductoController::class,'eliminar'])->name('producto.eliminar');

Route::get('/inscripcion/{user:id}/{evento}',[RegistrarEventoController::class,'index'])->name('evento.registrar');
Route::post('/inscripcion/{user:id}/{evento}',[RegistrarEventoController::class,'store']);

Route::post('/imprimir/{user:id}/{evento}',[RegistrarEventoController::class,'imprimir'])->name('evento.imprimir');


//Route::get('/pdf', function () {return view('pdf.pdfinscripcion');});





