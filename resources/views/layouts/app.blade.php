<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @stack('dropzone')
    <title>Instituto de la Mujer - @yield('titulo')</title>
    <link rel="shortcut icon" href="/favicon.ico" />
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
  </head>


  <header>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <div class="text-gray-700 bg-white fixed w-full z-20 top-0 left-0">
      <div x-data="{ open: true }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
        <div class="flex flex-row items-center justify-between p-4">
          <a href="{{route('home')}}" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg focus:outline-none focus:shadow-outline"><img src="{{asset('img/logo.jpg')}}" width="150" height="150"/></a>
        </div>
        <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow hidden pb-4 md:pb-0 md:flex md:justify-end md:flex-row ">
          <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{route('tienda')}}">Tienda</a>
          
          @auth
          <div class="relative" x-data="{ open: false }">
            <button @click="open = !open" class="flex flex-row text-gray-900 bg-gray-200 items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
              <span>{{auth()->user()->name}}</span>
              <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute w-full mt-2 origin-top-right">
              <div class="px-2 pt-2 pb-4 bg-white rounded-md shadow-lg">
                <div class="grid grid-cols-1 gap-4">
                  <a class="flex row items-start rounded-lg bg-transparent p-2 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{route('vendedor',auth()->user()->id)}}">
                    <div class="ml-3">
                      <p class="font-semibold">Mi Perfil</p>
                    </div>
                  </a>
                  <form method="POST" action="{{ route('logout',auth()->user()->id)}}" class="flex row items-start rounded-lg bg-transparent p-2 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    <div class="ml-3">
                      @csrf
                      <button class="font-semibold">Cerrar Sesión</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          @endauth

          @guest
            <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{route('login')}}">Ingresar</a>
            <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{route('register')}}">Registrarse</a>
          @endguest

        </nav>
        <div class="relative mr-3 md:mr-0 hidden md:block">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
          </div>
          <input type="text" id="email-adress-icon" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2" placeholder="Búsqueda...">
        </div>
      </div>
    </div>
  </header>
  
  
  <body> 
    <main >
      <div id="app" class="min-h-screen bg-fuchsia-700">
        <br><br><br><br>
        @yield('contenido')
      </div>
    </main>
  </body>

  <footer class="bg-rose-950 shadow row size-content-info">
    <div class="mx-auto w-full max-w-screen-xl">
      <div class="grid grid-cols-2 gap-8 px-4 py-6 lg:py-8 md:grid-cols-4">
        <div>
          <img src="https://www.ecatepec.gob.mx/images/elementos/Imagen1.png" alt="imagen logo municipio" class="img-fluid imagen-footer" width="100" height="100">
        </div>
        <div>
          <h2 class="mb-6 text-sm font-semibold uppercase text-white">H. Ayuntamiento</h2>
          <ul class="text-gray-500 font-medium">
            <li class="mb-2">
              <a href="http://sapase.gob.mx/" target="_blank" class="without-line-color">S.A.P.A.S.E</a>
            </li>
            <li class="mb-2">
              <a href="https://difecatepec.gob.mx" target="_blank" class="without-line-color">Sistema Municipal D.I.F</a>
            </li>
          </ul>
        </div>
        <div>
          <h2 class="mb-6 text-sm font-semibold uppercase text-white">Contáctanos</h2>
          <ul class="text-gray-500 font-medium">
            <li class="mb-2">
              Tel. 5836 1500
            </li>
            <li class="mb-2">
              Email.<br/>fernando.vilchis@ecatepec.gob.mx
            </li>
          </ul>
        </div>
        <div>
          <h2 class="mb-6 text-sm font-semibold uppercase text-white">Dirección</h2>
          <ul class="text-gray-500 font-medium">
            <li class="mb-2">
              Av. Juárez s/n, San Cristóbal, Ecatepec de Morelos, Estado de México. C.P. 55000
            </li>
          </ul>
        </div>
      </div>
      <hr class= "border-white sm:mx-auto">
      <div class="px-1 py-2 bg-rose-950 md:flexmd:items-center md:justify-between text-white">
        <span class="block text-sm sm:text-center">© 2023 Todos los derechos Reservados</span>
      </div>
    </div>
  </footer> 

</html>