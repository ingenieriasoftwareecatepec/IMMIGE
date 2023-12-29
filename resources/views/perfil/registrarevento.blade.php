@extends('layouts/app')

@section('titulo')
    {{$evento->nombre}}
@endsection

@section('contenido')

<div class="flex-1 flex flex-wrap">

    <div class="flex-1 p-4 w-full md:w-1/2">

        <div class="mt-8 flex flex-wrap space-x-0 space-y-2 md:space-x-4 md:space-y-0">
            <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">
                <div class="flex">
                    <div class="w-1/2 px-2">
                        <h2 class="flex text-rose-950 text-lg font-semibold pb-1"><div>{{$evento->nombre}}</h2>
                        <div class="my-1"></div>
                        <div class="bg-gradient-to-r from-rose-950 to-purple-800 h-px mb-6"></div>
                        <div class="py-4">
                            <div class="mb-4 py-2">
                                <label for="ubicacion" class="block text-gray-600 font-medium">Ubicación</label>
                                <p id="ubicacion" class="text-gray-800">{{$evento->ubicacion}}</p>
                            </div>
                            <div class="mb-4 py-2">
                                <label for="descripcion" class="block text-gray-600 font-medium">Estatus del evento</label>                        
                                <p id="descripcion" class="text-gray-800">{{$evento->estatus->descripcion}}</p>
                            </div>
                            <div class="mb-4 py-2">
                                <label for="cupo" class="block text-gray-600 font-medium">Lugares restantes</label>
                                <p id="cupo" class="text-gray-800">{{$evento->cupo}}</p>
                            </div>
                            <div class="mb-4 py-2">
                                <label for="fechas" class="block text-gray-600 font-medium">Fecha de inicio</label>
                                <p id="fechas" class="text-gray-800">{{$evento->fecha_ini}}</p>
                            </div>
                            <div class="mb-4 py-2">
                                <label for="fechas" class="block text-gray-600 font-medium">Fecha de cierre</label>
                                <p id="fechas" class="text-gray-800">{{$evento->fecha_fin}}</p>
                            </div>                            
                        </div>
                    </div>
                    <div class="w-1/2 px-2">
                        <h2 class="flex text-rose-950 text-lg font-semibold pb-1"><div>Incripción</h2>
                        <div class="my-1"></div>
                        <div class="bg-gradient-to-r from-rose-950 to-purple-800 h-px mb-6"></div>
                        <div class="py-4">
                            @if ($registrado == true)
                                Imprimir comprobante de inscripción
                                <div class="text-center py-6">
                                    <form method="POST" action="{{route('evento.imprimir',[$user->id,$evento->id])}}">
                                        @csrf
                                        <input type="hidden" name="evento" value="{{$evento->id}}" required>
                                        <input type="hidden" name="negocio" value="{{$negocioregistrado->id}}" required>
                                        <button type="submit" class="bg-purple-800 hover:bg-purple-900 text-white font-semibold py-2 px-4 rounded">
                                            Imprimir comprobante de Inscripción
                                        </button>
                                    </form>
                                    <br>
                                    <a href="{{route('vendedor',auth()->user()->id)}}" class="bg-purple-800 hover:bg-purple-900 text-white font-semibold py-2 px-4 rounded">
                                        Regresar a mi perfil
                                    </a>
                                </div>
                            @else
                                <form method="POST" action="{{route('evento.registrar',[$user->id,$evento->id])}}">
                                    @csrf
                                    <label for="Sel_negocio" class="py-2 block text-gray-600 font-medium">Seleccione el negocio que desea inscribir</label>
                                    <select type="text" id="negocio" name="negocio" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" required placeholder="Negocio" value="{{ old('negocio') }}">
                                        @foreach($negocios  as  $negocio)
                                            <option value="{{$negocio->id}}">{{$negocio->nombre}}</option>                                
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="evento" value="{{$evento->id}}" required>
                                    <div class="items-center text-center py-4">
                                        <button type="submit" class="bg-purple-800 hover:bg-purple-900 text-white font-semibold py-2 px-4 rounded">
                                        Aceptar
                                        </button>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">
                <h2 class="text-rose-950 text-lg font-semibold pb-1">Mapa</h2>
                <div class="my-1"></div>
                <div class="bg-gradient-to-r from-rose-950 to-purple-800 h-px mb-6"></div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d120297.43953201316!2d-99.03862124999998!3d19.571859!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2smx!4v1702662682950!5m2!1ses!2smx" class="w-full h-3/4 py-6" style="border:0;" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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

@endsection

