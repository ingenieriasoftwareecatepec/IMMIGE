<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Giro;
use App\Models\Negocio;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NegocioController extends Controller
{
    //
    public function mostrarNegocio()
    {
        $usuarioperfil = auth()->user()->id;
        $persona = Persona::where('user_id', $usuarioperfil)->first();
        $negocio = Negocio::all();

        dd($negocio);
        return view('negocio.editarnegocio',  compact('negocio'));
    }

    public function obtenerInfoNegocio()
    {
        // Obtener el usuario logueado
        $usuarioLogueado = Auth::user();
    
        // Obtener la persona asociada al usuario logueado
        $persona = Persona::where('user_id', $usuarioLogueado->id)->first();
    
        if (!$persona) {
            // Si no se encuentra la persona, redirigir o manejar el caso según tu lógica
            return redirect()->route('perfil.editar')->with('error', 'Usuario no encontrado');
        }
    
        // Obtener el negocio asociado a la persona
        $negocio = Negocio::where('persona_id', $persona->id)->first();
    
        if (!$negocio) {
            // Si no se encuentra el negocio, redirigir o manejar el caso según tu lógica
            return redirect()->route('negocio.crear')->with('error', 'Negocio no encontrado');
        }
    
        // Obtener la información del giro asociado al negocio
        $giro = Giro::find($negocio->giro_id);
    
        if (!$giro) {
            // Si no se encuentra el giro, redirigir o manejar el caso según tu lógica
            return redirect()->route('giro.crear')->with('error', 'Giro no encontrado');
        }
    
        // Tienes la información de la persona, el negocio y el giro asociado
        $muestrag = $giro;
    
        // Renderizar la vista con la información
        return view('negocio.editarnegocio', compact('negocio', 'muestrag'));
    }

public function actualizar(Request $request)
{
    // Verificar si el usuario está autenticado
    if (!auth()->check()) {
        // El usuario no está autenticado, redirigir a la página de inicio de sesión
        return redirect()->route('login');
    }

    // Obtener el ID del usuario autenticado y buscar su perfil
    $usuarioPerfil = auth()->user();
    $persona = Persona::where('user_id', $usuarioPerfil->id)->first();
    $busca = $persona->id;
    $negocio = Negocio::where('persona_id', $busca)->first();
    

    // Verificar si se encontró el perfil de la persona
    if (!$persona) {
        return redirect()->route('perfil.editar')->with('error', 'Perfil no encontrado');
    }

    // Validar los campos del formulario
    $request->validate([
        'nombre' => 'required',
        'descripcion' => 'required',
    ]);

    // Actualizar los datos del perfil
    $negocio->nombre = $request->input('nombre');
    $negocio->descripcion = $request->input('descripcion');
    $negocio->save();

    // Mensaje de éxito
    session()->flash('exito', 'La información se ha actualizado correctamente');

    return redirect()->route('negocio.mostrar');
}
}
