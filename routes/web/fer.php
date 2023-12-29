<?php

use App\Models\Producto;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NegocioController;
use App\Http\Controllers\PerfilController;


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


//////////////////////////       Editar Perfil de Emprendedora        //////////////////////////
Route::get('/perfil', [PerfilController::class, 'mostrarPerfil'])->name('perfil.mostrar');
Route::get('/perfil/editar', [PerfilController::class, 'editarPerfil'])->name('perfil.editar');
Route::put('/perfil/actualizar', [PerfilController::class, 'actualizar'])->name('perfil.actualizar');


//////////////////////////       Mostrar negocio       //////////////////////////
Route::get('/negocio/editar', [NegocioController::class, 'obtenerInfoNegocio'])->name('negocio.mostrar');

Route::put('/negocio/actualizar', [NegocioController::class, 'actualizar'])->name('negocio.actualizar');
