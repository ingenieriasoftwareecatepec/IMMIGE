<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\Persona;

class VendedorController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(User $user) {
        if (auth()->user()->id != $user->id) {
            return redirect()->route('vendedor',auth()->user()->id);
        }
        $eventos =  Evento::all();
        return view('perfil.vendedor',[
            'user' => $user,
            'eventos' => $eventos,
            ]);

    }
}

