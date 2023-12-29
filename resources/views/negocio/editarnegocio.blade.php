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
    <form method="POST" action="{{ route('negocio.actualizar') }}">
        @csrf
        @method('PUT')
            <div class="mt-8 flex flex-wrap space-x-0 space-y-2 md:space-x-4 md:space-y-0">
                <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">
                    <h2 class="flex text-rose-950 text-lg font-semibold pb-1"><div> Mi negocio</h2>
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
                            <input type="text" name="nombre" value="{{ $negocio->nombre }}" required>
                        </div>
                        <div class="w-1/2">
                            <label for="nombre" class="block text-gray-600 font-medium">Giro</label>
                            <input type="text" name="ap_paterno" value="{{ $muestrag->descripcion}}" required>
                        </div>
                    </div>
                    <div class="flex mb-4">                       
                        <div class="w-1/2">
                            <label for="nombre" class="block text-gray-600 font-medium">Descripción</label>
                            <input type="text" name="descripcion" value="{{ $negocio->descripcion }}" required>
                        </div>
                        <!-- <div class="w-1/2">
                            <label for="nombre" class="block text-gray-600 font-medium">Fecha de Nacimiento</label>
                            <p type="text" name="fecha_nac"></p>
                        </div> -->
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
                </div></div>
            </div>
            </div>
    </form>    
</div>
</div>

@endsection