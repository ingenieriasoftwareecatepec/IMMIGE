<?php

namespace App\Http\Controllers;

use App\Models\Giro;
use App\Models\User;
use App\Models\Roles;
use App\Models\Colonia;
use App\Models\Persona;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Negocio;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        $colonias = Colonia::all(['id', 'nombre']);
        $giros = Giro::all(['id', 'descripcion']);
        return view('auth.register', compact('colonias','giros'));
    }

    public function store(Request $request) {

        $request -> request->add(['username' => Str::slug($request->username)]);
        $rol = Roles::where('descripcion', 'Vendedor')->first();

        $this->validate($request,[
            'email' => 'email|required|unique:users',
            'name' => 'required|unique:users',
            'password' => 'required|confirmed',
            'curp' => 'required|unique:personas',
        ]);

        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $rol->id,
        ]);

        $person = Persona::create([
            'name' => $request->name,
            'ap_paterno' => $request->lastname1,
            'ap_materno' => $request->lastname2,
            'curp' => $request->curp,
            'colonia_id' => $request->colonia,
            'user_id' => $user->id,
            'telefono' => $request-> tel,
            'fecha_nac'=> $request-> birthdate,
        ]);

        Negocio::create([
            'nombre' => $request->name_neg,
            'giro_id' => $request->giro,
            'descripcion' => $request->descripcion,
            'persona_id' => $person->id,
            'distribuidora' => $request->has('distributor'),
        ]);

        auth()->attempt(($request->only('email','password')));

        return redirect()->route('vendedor',auth()->user()->id);
    }
}
