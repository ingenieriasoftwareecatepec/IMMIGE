@extends('layouts/app')

@section('titulo')
Registro
@endsection

@section('contenido')

<form action="{{route('register')}}" method="POST">
    @csrf
    <h1 class="text-4xl text-center font-semibold mb-4 text-white">Crear una cuenta</h1>
    <div class= "flex justify-center">
        <div class="p-10 w-full lg:w-1/2">
            <h1 class="text-2xl text-center font-semibold mb-4 text-white">Información Personal</h1>
            <div class="mb-4 flex justify-center items-center">
                <div class="lg:w-1/2 px-1">
                    <label for="name" class="block text-white">Nombre(s)</label>
                    <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" required placeholder="Nombre" maxlength="30" minlength="1" value="{{ old('name') }}">
                </div>
                <div class="lg:w-1/2 px-1">
                    <label for="lastname1" class="block text-white">Apellido Paterno</label>
                    <input type="text" id="lastname1" name="lastname1" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" required placeholder="Apellido Paterno" maxlength="30" minlength="1" value="{{ old('lastname1') }}">
                </div>
            </div>
            <div class="mb-4 flex justify-center items-center">
                <div class="lg:w-1/2 px-1">
                    <label for="lastname2" class="block text-white">Apellido Materno</label>
                    <input type="text" id="lastname2" name="lastname2" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" required placeholder="Apellido Materno" maxlength="30" minlength="1" value="{{ old('lastname2') }}">
                </div>
                <div class="lg:w-1/2 px-1">
                    <label for="curp" class="block text-white">CURP</label>
                    <input type="text" id="curp" name="curp" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" required placeholder="CURP000000EJEMPL00" maxlength="18" minlength="18" value="{{ old('curp') }}">
                </div>
            </div>
            <div class="mb-4 flex justify-center items-center">
                <div class="lg:w-1/2 px-1">
                    <label for="birthdate" class="block text-white">Fecha de Nacimiento</label>
                    <input type="date" id="birthdate" name="birthdate" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" required value="{{ old('birthdate') }}">
                </div>
                <div class="lg:w-1/2 px-1">
                    <label for="colonia" class="block text-white">Colonia</label>
                    <select type="text" id="colonia" name="colonia" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" required placeholder="Colonia" maxlength="30" value="{{ old('colonia') }}">
                        @foreach($colonias  as  $colonia)
                            <option value="{{$colonia->id}}">{{$colonia->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-4 flex items-center">
                <div class="lg:w-1/2 px-1">
                    <label for="tel" class="block text-white">Teléfono</label>
                    <input type="tel" id="tel" name="tel" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"  pattern="[0-9]{10}" required placeholder="10 digitos" minlength="10" maxlength="10" value="{{ old('tel') }}">
                </div>
                <div class="lg:w-1/2 px-1">
                    <label for="username" class="block text-white">Escriba un nombre de Usuario</label>
                    <input type="text" id="username" name="username" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" required placeholder="Nombre de usuario" maxlength="20" minlength="1" value="{{ old('username') }}">
                </div>
            </div>
            <div class="mb-4 flex justify-center items-center">
                <div class="lg:w-full px-1">
                    <label for="email" class="block text-white">Correo electronico</label>
                    <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" required placeholder="ejemplo@correo.com" maxlength="30" value="{{ old('email') }}">
                </div>
            </div>
            <div class="mb-4 flex items-center">
                <div class="lg:w-1/2 px-1">
                    <label for="password" class="block text-white">Contraseña</label>
                    <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" required placeholder="Minimo 8 caracteres" minlength="8">
                </div>
                <div class="lg:w-1/2 px-1">
                    <label for="password_confirmation" class="block text-white">Confirmar Contraseña</label>
                    <input type="password" id="password" name="password_confirmation" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" required placeholder="Minimo 8 caracteres" minlength="8">
                </div>
            </div>
        </div>
    
        <div class="p-10 w-full lg:w-1/2">
            <h1 class="text-2xl text-center font-semibold mb-4 text-white">Información de su Negocio</h1>

            <div class="mb-4 flex justify-center items-center">
                <div class="lg:w-1/2 px-1">
                    <label for="name_neg" class="block text-white">Nombre del Negocio</label>
                    <input type="text" id="name_neg" name="name_neg" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" required placeholder="Nombre del Negocio" maxlength="30" minlength="1" value="{{ old('name_neg') }}">
                </div>
                <div class="lg:w-1/2 px-1">
                    <label for="giro" class="block text-white">Tipo de Negocio</label>
                    <select type="text" id="giro" name="giro" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" required placeholder="Tipo de Negocio" maxlength="30" value="{{ old('giro') }}">
                        @foreach($giros  as  $giro)
                            <option value="{{$giro->id}}">{{$giro->descripcion}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-4 flex justify-center items-center">
                <div class="lg:w-full px-1">
                    <label for="descripcion" class="block text-white">Descripción del Negocio</label>
                    <textarea id="descripcion" name="descripcion" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" required placeholder="Descripcion del Negocio" maxlength="400" minlength="1" value="{{ old('descripcion') }}" rows="6" cols="20"></textarea>
                </div>
            </div>

            <div class="mb-4 flex items-center">
                <input type="checkbox" id="distributor" name="distributor" class="text-white">
                <label for="distributor" class="text-white ml-2">¿Es distribuidora?</label>
            </div>

            @error('password')
                <div class="mb-4 bg-red-800 text-white ml-2 p-4">
                    {{$message}}
                </div>
            @enderror
            @error('email')
                <div class="mb-4 bg-red-800 text-white ml-2 p-4">
                    {{$message}}
                </div>
            @enderror
            @error('username')
                <div class="mb-4 bg-red-800 text-white ml-2 p-4">
                    {{$message}}
                </div>
            @enderror
            @error('curp')
                <div class="mb-4 bg-red-800 text-white ml-2 p-4">
                    {{$message}}
                </div>
            @enderror
            <button type="submit" class="bg-purple-800 hover:bg-purple-800 text-white font-semibold rounded-md py-2 px-4 w-full">Registrarse</button>
        </form>
        <div class="mt-6 text-gray-300 text-center">¿Ya tienes cuenta?
            <a href="{{route('login')}}" class="hover:underline text-purple-950"><b>Ingresar</b></a>
        </div>
    </div>

@endsection