<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function store(Request $request) {
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!auth()->attempt($request->only('email','password'),$request->remember)){
            return back()->with('mensaje','El correo o la contraseña que ingreso son incorrectos');
        }

        if(auth()->user()->role_id===1){
        return redirect()->route('adminHome');
        }

        return redirect()->route('vendedor',auth()->user()->id);
    }

}
