@extends('layouts/app')

@section('titulo')
    {{$user->name}}
@endsection

@section('contenido')

@php
    $persona = auth()->user()->persona;
    $colonia = $persona->colonia;
    $negocio = $persona->negocio->first();
    $productos = $negocio->producto;
    $negocios_eventos = $negocio->eventos;
@endphp



<div class="flex-1 flex flex-wrap">

    <div class="flex-1 p-4 w-full md:w-1/2">

        <div class="mt-8 flex flex-wrap space-x-0 space-y-2 md:space-x-4 md:space-y-0">
            <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">
                <h2 class="flex text-rose-950 text-lg font-semibold pb-1"><div> Mi perfil</h2>
                <div class="my-1"></div>
                <div class="bg-gradient-to-r from-rose-950 to-purple-800 h-px mb-6"></div>

                <div class="mb-1">
                    <div class="flex">
                        <div class="mb-4 w-1/3">
                            <img src="{{asset('img/logo.jpg')}}" class="object-cover w-full border-purple-800 px-4"/>
                        </div>
                        <div class="mb-4 w-1/3">
                            <label for="nombre" class="block text-gray-600 font-medium">Nombre</label>
                            <p id="nombre" class="text-gray-800">{{$persona->name}}</p>
                        </div>
                        <div class="mb-4 w-1/3">
                            <label for="nombre" class="block text-gray-600 font-medium">Apellido Paterno</label>
                            <p id="nombre" class="text-gray-800">{{$persona->ap_paterno}}</p>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="mb-4  w-1/3">
                            <label for="nombre" class="block text-gray-600 font-medium">Correo electronico:</label>
                            <p id="nombre" class="text-gray-800">{{$user->email}}</p>
                        </div>
                        <div class="mb-4  w-1/3">
                            <label for="nombre" class="block text-gray-600 font-medium">Apellido Matrerno</label>
                            <p id="nombre" class="text-gray-800">{{$persona->ap_materno}}</p>
                        </div>
                        <div class="mb-4  w-1/3">
                            <label for="nombre" class="block text-gray-600 font-medium">Fecha de Nacimiento</label>
                            <p id="nombre" class="text-gray-800">{{$persona->fecha_nac}}</p>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="mb-4  w-1/3">
                            <label for="nombre" class="block text-gray-600 font-medium">Teléfono:</label>
                            <p id="nombre" class="text-gray-800">{{$persona->telefono}}</p>
                        </div>
                        <div class="mb-4  w-1/3">
                            <label for="nombre" class="block text-gray-600 font-medium">Colonia:</label>
                            <p id="nombre" class="text-gray-800">{{$colonia->nombre}}</p>
                        </div>
                        
                    </div> <br><br><br>
                    <div class="text-right mt-4">
                        <a href="/negocio/editar" class="bg-purple-800 hover:bg-purple-900 text-white font-semibold py-2 px-4 rounded">
                            Editar Negocio
                        </a> &nbsp;
                        <a href="/perfil/editar" class="bg-purple-800 hover:bg-purple-900 text-white font-semibold py-2 px-4 rounded">
                            Editar Perfil
                        </a>
                    </div>
                </div>
            </div>

            @push('dropzone')
            <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
            @endpush

            <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">
                <h2 class="text-rose-950 text-lg font-semibold pb-1">Publicar un producto</h2>
                <div class="my-1"></div>
                <div class="bg-gradient-to-r from-rose-950 to-purple-800 h-px mb-6"></div>
                    <div class="py-2">Imagenes del producto (Min 1 y Max 5)</div>
                    <form method="POST" action="{{route('imagen.store',$user->id)}}" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full rounded flex-col justify-center items-center bg-purple-100">@csrf</form>
                    <form method="POST" action="{{route('producto.crear',$user->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="flex py-2">
                            <div class="w-1/2 px-2">
                            <div class="mb-4">
                                Nombre
                                <input type="text" id="product" name="product" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-purple-800" required placeholder="Ejemplo: Galletas de Mantequilla" maxlength="100" minlength="1" value="{{ old('product') }}">    
                            </div>
                            <div class="mb-4">
                                Marca
                                <input type="text" id="marca" name="marca" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-purple-800" placeholder="(Opcional)" maxlength="100" value="{{ old('marca')}}">    
                            </div>
                            </div>
                            <div class="w-1/2 px-2">
                            <div class="mb-4">
                                Descripción corta del producto
                                <textarea  type="text" id="description" name="description" class="w-full border border-gray-300 rounded-md px-3 focus:outline-none focus:border-purple-800" required rows="5" maxlength="300" value="{{ old('description') }}"></textarea>
                            </div>
                            </div>
                        </div>
                        <input type="hidden" name="negocio_id" value="{{$negocio->id}}" required>
                        <input type="hidden" name="estatus_producto" value="1" required>
                        <input type="hidden" name="imagen" value="{{old('imagen')}}" required>
                        @error('imagen')
                            <div class="mb-4 bg-red-800 text-white ml-2 p-4">
                                {{$message}}
                            </div>
                        @enderror
                        <div class="text-right mt-4">
                            <button type="submit" class="bg-purple-800 hover:bg-purple-900 text-white font-semibold py-2 px-4 rounded">
                                Subir
                            </button>
                        </div>
                    </form>
                </div>
            </div>




            <div class="mt-8 bg-white p-4 shadow rounded-lg">
                <h2 class="text-rose-950 text-lg font-semibold pb-4">Mis porductos</h2>
                <div class="my-1"></div>
                <div class="bg-gradient-to-r from-rose-950 to-purple-800 h-px mb-6"></div>
                <table class="w-full table-auto text-sm">
                    <thead>
                        <tr class="text-sm leading-normal">
                            <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Nombre</th>
                            <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Descripción</th>
                            <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Marca del producto</th>
                            <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Estatus del producto</th>
                            <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos  as $producto)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-2 px-4 border-b border-grey-light break-all">{{$producto->nombre}}</td>
                                <td class="py-2 px-4 border-b border-grey-light break-all">{{$producto->descripcion}}</td>
                                <td class="py-2 px-4 border-b border-grey-light break-all">{{$producto->marca ?? 'N/A'}}</td>
                                <td class="py-2 px-4 border-b border-grey-light break-all">{{$producto->estatus->descripcion}}</td>
                                <td class="py-2 px-4 border-b border-grey-light text-center">
                                    <form method="POST" action="{{route('producto.eliminar',$user->id)}}">
                                        @csrf
                                        <input type="hidden" name="eliminar" value="{{$producto->id}}" required>
                                        <button type="submit" class="bg-purple-800 hover:bg-purple-900 text-white font-semibold py-2 px-4 rounded">
                                            Eliminar
                                        </button>
                                    <form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>




        <div class="mt-8 bg-white p-4 shadow rounded-lg">
            <div class="bg-white p-4 rounded-md mt-4">
                <h2 class="text-rose-950 text-lg font-semibold pb-4">Eventos</h2>
                <div class="my-1"></div>
                <div class="bg-gradient-to-r from-rose-950 to-purple-800 h-px mb-6"></div>
                <table class="w-full table-auto text-sm">
                    <thead>
                        <tr class="text-sm leading-normal">
                            <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Nombre</th>
                            <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Ubicación</th>
                            <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Lugares Disponibles</th>
                            <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Fecha</th>
                            <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Estatus</th>
                            <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Mi Incripción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($eventos as $evento)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-2 px-4 border-b border-grey-light">{{$evento->nombre}}</td>
                                <td class="py-2 px-4 border-b border-grey-light">{{$evento->ubicacion}}</td>
                                <td class="py-2 px-4 border-b border-grey-light text-center">{{$evento->cupo}}</td>
                                <td class="py-2 px-4 border-b border-grey-light text-center">{{$evento->fecha_ini}} a {{$evento->fecha_fin}}</td>
                                <td class="py-2 px-4 border-b border-grey-light">{{$evento->estatus->descripcion}}</td>
                                <td class="py-2 px-4 border-b border-grey-light">
                                    @if ($negocios_eventos->contains($evento))
                                        @php
                                            $negocio_evento = $negocio->eventos()->where('evento_id', $evento->id)->first();
                                        @endphp
                                        <p class="uppercase text-purple-800 font-bold">Incrito - Espacio {{$negocio_evento->pivot->lugar}}</p>
                                    @else
                                        @if ($evento->cupo > 0)
                                        <a href="{{route('evento.registrar',[auth()->user()->id,$evento])}}" class="bg-purple-800 hover:bg-purple-900 text-white font-semibold py-2 px-4 rounded">
                                            Inscribirse
                                        </a>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
@endif
@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: '{{ session('error') }}',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
@endif

@endsection