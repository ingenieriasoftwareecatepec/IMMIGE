<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    function __construct(){
        $this->middleware('auth');

        $this->middleware('roles:Administrador');
    }


    public function index(){

        return view('layouts.admin');

    }


}
