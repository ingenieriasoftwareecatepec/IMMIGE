<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- @stack('dropzone') -->
    <title>Instituto de la Mujer - @yield('titulo')</title>
    <link rel="shortcut icon" href="/favicon.ico" />
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
  </head>


  @include('partials.nav')
  
  
  <body> 
    <div id="app">
      <main >
        <div class="min-h-screen bg-fuchsia-700">
          <br><br><br><br><br>
          @yield('contenido')
        </div>
      </main>
    </div>
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