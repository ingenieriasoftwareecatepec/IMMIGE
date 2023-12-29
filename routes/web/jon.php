<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EventosController;



Route::get('admin/home', [ AdminController::class, 'index' ])->name('adminHome');


Route::group(['prefix' => 'eventos', 'middleware' => ['auth', 'roles:Administrador']], function(){
    Route::get('create', [EventosController::class, 'create'] )->name('eventos.create');
});