<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Colonia;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    //

    public function mostrarPerfil()
    {
        $usuarioperfil = auth()->user()->id;

        $usuario = Persona::find($usuarioperfil);

        $usuariouser = auth()->user();

        return view('perfil.editperfil', compact('usuario', 'usuariouser'));
    }

    public function editarPerfil()
    {
        $usuarioperfil = auth()->user()->id;

        $usuario = Persona::where('user_id',$usuarioperfil)->first();

        $usuariouser = auth()->user();

        $colonias = Colonia::all();


        return view('perfil.editperfil', compact('usuario',  'usuariouser', 'colonias'));
    }

    public function actualizar(Request $request)
    {
        
        if (auth()->check()) {
            $usuario = auth()->user()->id;
            $usuariop = Persona::where('user_id', $usuario)->first();

        } else {
            // El usuario no está autenticado
            return redirect()->route('login');
        }
    
        
        if (!$usuariop) {
            return redirect()->route('perfil.editar')->with('error', 'Usuario no encontrado');
        }

        $request->validate([
            'name' => '',
            'email' => '',
            'ap_paterno' => '',
            'ap_materno' => '',
            'telefono' => '',
        ]);
        
        
        $usuariop->name = $request->name;
        $usuariop->ap_paterno = $request->ap_paterno;
        $usuariop->ap_materno = $request->ap_materno;
        $usuariop->telefono = $request->telefono;

        $usuariop->name = $request->filled('name') ? $request->name : $usuariop->name;
        $usuariop->ap_paterno = $request->filled('ap_paterno') ? $request->ap_paterno : $usuariop->ap_paterno;
        $usuariop->ap_materno = $request->filled('ap_materno') ? $request->ap_materno : $usuariop->ap_materno;
        $usuariop->telefono = $request->filled('telefono') ? $request->telefono : $usuariop->telefono;
        
        $usuariop->save();

        // Mensaje de éxito
        Session::flash('exito', 'La información se ha actualizado correctamente');

        return redirect()->route('perfil.editar');
    }

    public function editar()
    {
        $usuario = auth()->user()->id;

        $usuariop = Persona::find($usuario);

        return view('perfil.editperfil', compact('usuario'))->with('success', 'Perfil actualizado exitosamente');
    }

}
