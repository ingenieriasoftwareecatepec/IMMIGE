<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class PublicacionController extends Controller
{
    public function index(Producto $producto) {
        return view('layouts.publicacion',[
            'producto' => $producto,
            ]);
    }
}
