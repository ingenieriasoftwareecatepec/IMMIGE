@extends('layouts/app')

@section('titulo')
    {{$producto->nombre}}
@endsection

@section('contenido')

<div class="flex py-6 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 w-full h-full">

    <div class="w-1/2">
        <div class="flex flex-col md:flex-row -mx-4">
            <div class="md:flex-1 px-4">
                @foreach($producto->imagenes as $index=>$imagen)
                <div class="">
                   <input class="sr-only peer" type="radio" name="carousel" id="carousel-{{$index+1}}" {{$index == 0 ? 'checked' : ''}} />
                   <div class="w-200 absolute left-1/1 top-1/2 transform -translate-x-0 -translate-y-1/2 bg-white rounded-lg shadow-lg transition-all duration-300 opacity-0 peer-checked:opacity-100 peer-checked:z-10 z-0">

                      <img class="rounded-t-lg w-full h-full" src="{{asset('img/productos/'.$imagen->archivo)}}" alt="" />
                      <!-- controls -->
                      <div class="absolute top-1/2 w-full flex justify-between z-20">
                         <label for="carousel-{{$index == 0 ? $producto->imagenes->count() : $index}}" class="inline-block text-rose-950 cursor-pointer -translate-x-5 bg-white rounded-full shadow-md active:translate-y-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                               <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
                            </svg>
                         </label>
                         <label for="carousel-{{$index+2 > $producto->imagenes->count() ? 1 : $index+2}}" class="inline-block text-rose-950 cursor-pointer translate-x-5 bg-white rounded-full shadow-md active:translate-y-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                               <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                            </svg>
                         </label>
                      </div>
                   </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="mt-8 flex w-1/2">
        <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">
                <div class="px-2">
                    <h2 class="flex text-rose-950 text-2xl font-semibold pb-1 break-all"><div>{{$producto->nombre}}</h2>
                    <div class="my-1"></div>
                    <div class="bg-gradient-to-r from-rose-950 to-purple-800 h-px mb-6"></div>
                        <p class="text-purple-800 py-4 break-all">{{$producto->marca }}</p>
                        <p class="text-black py-4 break-all">{{$producto->descripcion}}</p>
                    <div class="py-4">
                                                  
                    </div>
                </div>
                <div class="px-2">
                    <h2 class="flex text-rose-950 text-2xl font-semibold pb-1"><div>Datos de contacto</h2>
                    <div class="my-1"></div>
                    <div class="bg-gradient-to-r from-rose-950 to-purple-800 h-px mb-6"></div>
                    <table class="w-full table-auto text-sm text-left">
                        <tbody>
                                <tr>
                                    <th class="py-2 px-4 break-all">Vendido por:</td>
                                    <td>{{$producto->negocio->nombre}}</td>
                                </tr>
                                <tr>
                                    <th class="py-2 px-4 break-all">Telefono:</td>
                                    <td>{{$producto->negocio->persona->telefono}}</td>
                                </tr>
                                <tr>
                                    <th class="py-2 px-4 break-all">Correo: </td>
                                    <td>{{$producto->negocio->persona->user->email}}</td>
                                </tr>
                        </tbody>
                    </table>
                </div> 
        </div>
    </div>
</div>

@endsection