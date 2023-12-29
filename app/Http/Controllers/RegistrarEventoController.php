<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Negocio;
use App\Models\Persona;
use Illuminate\Http\Request;
use App\Models\NegocioEvento;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;

class RegistrarEventoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(User $user,Evento $evento) {        
        if (auth()->user()->id != $user->id) {
            return redirect()->route('vendedor',auth()->user()->id);
        }

        $registrado = false;
        $negocioregistrado = null;
        $persona = Persona::where('user_id',$user->id)->first();
        $negocios = Negocio::where('persona_id',$persona->id)->get();
        foreach ($negocios as $negocio){
            $negocios_eventos = $negocio->eventos;
            if ($negocios_eventos->contains($evento)){
                $registrado = true;
                $negocioregistrado = $negocio;
            }
        };


        if ($evento->cupo < 1 && $registrado == false){
            return redirect()->route('vendedor',auth()->user()->id);
        };
        
        return view('perfil.registrarevento',[
            'user' => $user,
            'evento' => $evento,
            'negocios' => $negocios,
            'registrado' => $registrado,
            'negocioregistrado' => $negocioregistrado
            ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'negocio' => 'required',
            'evento' => 'required'
        ]);

        $evento = Evento::find($request->evento);
        if ($evento->cupo < 1){
            return redirect()->route('vendedor',auth()->user()->id)->with('error', 'Los espacios para el evento estan agotados');
        };

        NegocioEvento::create([
            'negocio_id' => $request->negocio,
            'evento_id' => $request->evento,
            'lugar' => $evento->cupo,
        ]);

        $evento->decrement('cupo');
        $registrado = true;
        return redirect()->route('evento.registrar', [auth()->user()->id, $evento->id, $request->negocio])->with(['success' => 'Su inscripción se realizó correctamente']);

    }

    public function imprimir(User $user, Request $request){

        $persona = Persona::where('user_id',$user->id)->first();
        $negocio = Negocio::where('id', $request->negocio)->first();
        $evento = Evento::where('id', $request->evento)->first();

        $data = [
            'persona' => $persona,
            'evento' => $evento,
            'negocio' => $negocio
        ];
        $pdf = App::make('dompdf.wrapper');
        return $pdf->loadView('pdf.pdfinscripcion', $data)->download("Comprobante de Inscripción.pdf");
    }
}
