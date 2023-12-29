<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ImgController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function store(Request $request){

        $imagen = $request->file('file');
        $nombreimagen = Str::uuid().".".$imagen->extension();
        $imagenservidor = Image::make($imagen);
        $imagenservidor->fit(500,500,null);

        $imagenpath = public_path('img').'/productos/'.$nombreimagen;
        $imagenservidor->save($imagenpath);

        return response()->json(['imagen'=>$nombreimagen]);
    }
}
