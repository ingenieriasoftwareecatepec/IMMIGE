<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventosController extends Controller
{


    public function create(){

        return view('admin.eventos.create');

    }


}
