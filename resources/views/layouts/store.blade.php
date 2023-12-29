@extends('layouts/app')

@section('titulo')
    Productos
@endsection

@section('contenido')
<div class="bg-fuchsia-700">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
      <!--<h2 class="text-white">Productos</h2>-->
      
      <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
        @foreach($productos  as $producto)
          <a href="{{url('/publicacion/'.$producto->id)}}" class="group bg-purple-300 p-2 rounded">
            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                <img src="{{asset('img/productos/'.$producto->imagenes->first()->archivo)}}" alt="{{$producto->nombre}}" class="h-full w-full object-cover object-center group-hover:opacity-75">
            </div>
            <p class="mt-1 text-lg font-medium text-gray-900 break-all">{{$producto->nombre}}<p class="text-sm text-gray-800">{{$producto->marca}}</p></p>
            <h3 class="mt-4 text-sm text-gray-800 break-all">{{$producto->descripcion}}</h3>
          </a>
        @endforeach
      </div>

    </div>
  </div>
@endsection