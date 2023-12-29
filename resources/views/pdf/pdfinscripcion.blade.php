<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
  </head>


  <body class="bg-gray-100 py-8 px-4">
      <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
          <div class="w-full px-2">
            <h1 class="flex text-rose-950 text-lg font-semibold pb-1"><div>Instituto municipal de las mujeres e igualdad de genero</h1>
            <div class="my-1"></div>
            <div class="bg-gradient-to-r from-rose-950 to-purple-800 h-px mb-6"></div>
            <div class="py-4">

              <h1 class=" font-bold mb-4 py-2">Datos del Participante</h1>
              <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <tbody>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">Nombre:</th>
                            <td class="px-6 py-4">{{$persona->name}}</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">Apellidos:</th>
                            <td class="px-6 py-4">{{$persona->ap_paterno}} {{$persona->ap_materno}}</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">CURP:</th>
                            <td class="px-6 py-4">{{$persona->curp}}</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">Estado:</th>
                            <td class="px-6 py-4">{{$persona->colonia->estado}}</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">Municipio:</th>
                            <td class="px-6 py-4">{{$persona->colonia->municipio}}</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">Colonia:</th>
                            <td class="px-6 py-4">{{$persona->colonia->nombre}}</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">CP:</th>
                            <td class="px-6 py-4">{{$persona->colonia->cp}}</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">Telefono:</th>
                            <td class="px-6 py-4">{{$persona->telefono}}</td>
                        </tr>
                    </tbody>
                </table>
              </div>

              <h1 class=" font-bold mb-4 py-4">Información del evento del Evento</h1>
              <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <tbody>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">Nombre del Evento:</th>
                            <td class="px-6 py-4">{{$evento->nombre}}</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">Ubicación:</th>
                            <td class="px-6 py-4">{{$evento->ubicacion}}</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">Fecha de inicio:</th>
                            <td class="px-6 py-4">{{$evento->fecha_ini}}</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">Fecha de término:</th>
                            <td class="px-6 py-4">{{$evento->fecha_fin}}</td>
                        </tr>
                    </tbody>
                </table>
              </div>

              <h1 class=" font-bold mb-4 py-4">Información del negocio registrado</h1>
              <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <tbody>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">Nombre del Negocio:</th>
                            <td class="px-6 py-4">{{$negocio->nombre}}</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">Tipo:</th>
                            <td class="px-6 py-4">{{$negocio->giro_id}}</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">Descripción:</th>
                          <td class="px-6 py-4">{{$negocio->descripcion}}</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">Distribuidor:</th>
                          <td class="px-6 py-4">{{$negocio->distribuidor}}</td>
                        </tr>
                    </tbody>
                </table>
              </div>                          
            </div>
          </div>
      </div>
  </body>
  

</html>