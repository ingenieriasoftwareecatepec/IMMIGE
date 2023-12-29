@extends('layouts/app')

@section('titulo')
Iniciar sesión
@endsection

@section('contenido')

<div id="contenido1" style="display: block;">
<div class="bg-fuchsia-600 flex justify-center items-center h-screen">
    <div class="w-1/2 h-screen hidden lg:block bg-purple-800">
        <img src="{{ asset('img/img7.png') }}" class="object-cover w-full h-full">
    </div>
    <div class="lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-1/2">
        <h1 class="text-2xl font-semibold mb-4 text-white">Ingresar con tu cuenta</h1>
        <form action="{{route('login')}}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-white">Correo</label>
                <input type="email" id="email" name="email" class="w-full border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500 border-gray-300" placeholder="Ingrese su correo electronico" value="{{ old('email') }}" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-white">Contraseña</label>
                <input type="password" id="password" name="password" class="w-full border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500 border-gray-300" placeholder="Contraseña" required>
            </div>
            <div class="mb-4 flex items-center">
                <input type="checkbox" id="remember" name="remember" class="text-white">
                <label for="remember" class="text-white ml-2">Recordarme</label>
            </div>
            <div class="mb-6 text-purple-950">
                <a href="#" class="hover:underline"><b>¿Olvidaste tu contraseña?</b></a>
            </div>
            @if(session('mensaje'))
                <div class="mb-4 bg-red-800 text-white ml-2 p-4">
                    {{session('mensaje')}}
                </div>
            @endif
                <button type="submit" class="bg-purple-800 hover:bg-purple-800 text-white font-semibold rounded-md py-2 px-4 w-full">Ingresar</button>
        </form>
        <div class="mt-6 text-gray-300 text-center">¿Todavia no tienes cuenta?
            <a href="{{route('register')}}" class="hover:underline text-purple-950"><b>Registrarse</b></a>
        </div>
    </div>
</div>
</div>


@endsection