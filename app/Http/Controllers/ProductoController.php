<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductoImg;

class ProductoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(Request $request) {
        $this->validate($request,[
            'product' => 'required',
            'description' => 'required',
            'imagen' => 'required'
        ]);
        
        $producto = Producto::create([
            'nombre' => $request->product,
            'descripcion' => $request->description,
            'marca' => $request->marca,
            'estatus_producto_id' => $request->estatus_producto,
            'negocio_id' => $request->negocio_id,
        ]);

       
        $imagenes = json_decode($request->get('imagen'), true);

        foreach ($imagenes as $imagen){
            $url  = public_path('img').'/productos/'.$imagen;
            ProductoImg::create([ 
                'producto_id' => $producto->id, 
                'url' => $url, 
                'archivo' => $imagen, 
            ]);
        };

        return redirect()->route('vendedor',auth()->user()->id)->with('success', 'Producto registrado correctamente');
    }

    public function eliminar(Request $request) {
        
        $producto = Producto::find($request->eliminar);
        $producto->delete();
        $imagenes = ProductoImg::where('producto_id',$request->eliminar)->get();
        foreach($imagenes as $imagen){
            $imagen->delete();
        };

        return redirect()->route('vendedor',auth()->user()->id)->with('success', 'Producto eliminado correctamente');
    }
}
