<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\ProductoImg;
use Illuminate\Http\Request;

class TiendaController extends Controller
{
    public function index() {
        $productos =  Producto::all();
        return view('layouts.store',[
            'productos' => $productos,
            ]);
    }
}
