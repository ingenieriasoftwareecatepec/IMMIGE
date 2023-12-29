@extends('layouts/app')

@section('contenido')


<div class="flex-1 flex flex-wrap">
<div class="flex-1 p-4 w-full md:w-1/2">
    <!-- Mensaje de que la información se actualizó de manera correcta -->
    @if(Session::has('exito'))
    <div id="exito" class="bg-purple-800 hover:bg-purple-900 text-white font-semibold py-2 px-4 rounded">
        {{ Session::get('exito') }}
    </div>

    <script>
        // Temporizador para ocultar el mensaje después de 3.5 segundos
        setTimeout(function() {
            document.getElementById('exito').style.display = 'none';
        }, 3500);
    </script>
@endif

<form method="POST" action="{{ route('perfil.actualizar') }}">
    @csrf
    @method('PUT')
    <div class="mt-8 flex flex-wrap space-x-0 space-y-2 md:space-x-4 md:space-y-0">
        <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">
            <h2 class="flex text-rose-950 text-lg font-semibold pb-1"><div>Editar Mi Perfil</h2>
            <div class="my-1"></div>
            <div class="bg-gradient-to-r from-rose-950 to-purple-800 h-px mb-6"></div>

            <div class="flex mb-1">
                <div class="w-1/3 p-6">
                    <img src="{{asset('img/logo.jpg')}}" class="object-cover w-full border-purple-800"/>
                </div>
                <div class="w-2/3">
                    <div class="flex mb-4">
                        <div class="w-1/2">
                            <label for="nombre" class="block text-gray-600 font-medium">Nombre</label>
                            <input type="text" name="name" value="{{ $usuario->name }}" required>
                        </div>
                        <div class="w-1/2">
                            <label for="nombre" class="block text-gray-600 font-medium">Apellido Paterno</label>
                            <input type="text" name="ap_paterno" value="{{ $usuario->ap_paterno }}" required>
                        </div>
                    </div>
                    <div class="flex mb-4">
                        <div class="w-1/2">
                            <label for="nombre" class="block text-gray-600 font-medium">Apellido Matrerno</label>
                            <input type="text" name="ap_materno" value="{{ $usuario->ap_materno }}" required>
                        </div>
                        <div class="w-1/2">
                            <label for="nombre" class="block text-gray-600 font-medium">Fecha de Nacimiento</label>
                            <p type="text" name="fecha_nac">{{ $usuario->fecha_nac }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex mb-4">
                <div class="w-1/3">
                    <label for="nombre" class="block text-gray-600 font-medium">Teléfono:</label>
                    <input type="text" name="telefono" value="{{ $usuario->telefono }}" required>
                </div>
                <div class="w-1/3">
                    <label for="nombre" class="block text-gray-600 font-medium">Colonia:</label>
                    <p type="text" name="colonia">{{ $usuario->colonia->nombre }}</p>
                </div>
                <div class="w-1/3">
                    <label for="nombre" class="block text-gray-600 font-medium">CP:</label>
                    <p type="text" name="cp">{{ $usuario->colonia->cp }}</p>
                </div>
            </div>
            <div class="flex mb-4">
                <div class="w-1/3">
                    <label for="nombre" class="block text-gray-600 font-medium">Correo electronico:</label>
                    <p id="email" class="text-gray-800">{{$usuariouser->email}}</p>
                </div>
                <div class="w-1/3">
                    <label for="nombre" class="block text-gray-600 font-medium">CURP:</label>
                    <p id="curp" class="text-gray-800">{{$usuario->curp}}</p>
                </div>
                <div class="w-1/3">
                    <label for="nombre" class="block text-gray-600 font-medium">Distribuidora:</label>
                    <p id="nombre" class="text-gray-800">
                        @if($usuario->distributor == 1)
                            Si
                        @else
                            No
                        @endif
                    </p>  
                </div>
            </div>
            <div class="text-right mt-4">
                
           <!--  <form action="{{ url()->previous() }}" method="get">
            <button type="submit" class="bg-purple-800 hover:bg-purple-900 text-white font-semibold py-2 px-4 rounded">Volver</button>
            </form> -->

                 &nbsp;
                <button type="submit" class="bg-purple-800 hover:bg-purple-900 text-white font-semibold py-2 px-4 rounded">Guardar Cambios</button>
            </div>
            </form>
        </div>


    
    </div>
</div>
</div>
</div>

@endsection