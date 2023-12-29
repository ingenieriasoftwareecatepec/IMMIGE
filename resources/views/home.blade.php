@extends('layouts/app')

@section('titulo')
    Home
@endsection

@section('contenido')
  <div class="flex justify-center items-center h-screen">
    <div class="w-3/4 h-screen hidden lg:block">
      <img src="{{ asset('img/img9.png') }}" alt="IMMIG" class="object-cover w-full h-full">
    </div>
    <div class="lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-1/2 text-white text-2xl">
        <h2 class="text-4xl font-bold text-gray-100 tracking-tight">Instituto Municipal de las Mujeres e Igualdad de Género</h2>
        <br class="hidden sm:block lg:hidden"><br>
        <p class="mt-4 text-gray-300">
            El compromiso de salvaguardar a las mujeres ecatepenses y promover activamente su empoderamiento es fundamental en nuestra labor. Nos esforzamos por crear un entorno seguro y propicio donde cada mujer pueda desarrollarse plenamente, participar activamente en la comunidad y alcanzar su máximo potencial. A través de programas integrales, iniciativas educativas y acciones concretas, buscamos fortalecer la presencia y la voz de las mujeres en Ecatepec, contribuyendo así a la construcción de una sociedad más equitativa y justa para todas.
        </p>
    </div>
    
  </div>

@endsection