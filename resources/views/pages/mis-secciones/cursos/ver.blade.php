@php
use \App\Common\AtributosNotaDetalle;
[$tareas, $examen, $total] = AtributosNotaDetalle::getAtributos(unidad: $id);
@endphp
<x-app-layout>
  <div class="max-w-5xl mx-auto">
    <h1 class="text-gray-800 dark:text-gray-200 font-bold text-base md:text-xl my-5">
      {{$alumno->nombre}} {{$alumno->apellido}}
    </h1>
    @if(session('actualizacion_exitosa'))
    <span class="dark:text-emerald-500 text-emerald-700 text-center my-5 mx-auto block">
      {{session('actualizacion_exitosa')}}
    </span>
    @endif
    @if(session('creacion_exitosa'))
    <span class="dark:text-emerald-500 text-emerald-700 text-center my-5 mx-auto block">
      {{session('creacion_exitosa')}}
    </span>
    @endif
    @error('actualizacion_fallida')
    <span class="dark:text-red-500 text-red-700 text-center my-5 mx-auto block">
      {{$message}}
    </span>
    @enderror
    <div class="relative overflow-x-auto max-w-6xl mx-auto my-5 text-gray-800 dark:text-gray-200">
      <form action="{{route('mis_secciones.cursos.actualizar', [
        'alumno' => $alumno->id,
        'id' => $id,
      ])}}" method="POST">
        @csrf
        <table class="w-full">
          <thead>
            <tr>
              <th>Curso</th>
              <th>Tareas</th>
              <th>Examen</th>
              <th>Promedio total</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($notas->detalles as $detalle)
            <tr>
              <td>{{$detalle->curso->nombre}}</td>
              <td>
                <div class="flex justify-center w-full">
                  <input type="text" id="{{" curso_tareas_{$detalle->curso->id}"}}"
                  name="{{"curso_tareas_{$detalle->curso->id}"}}"
                  class="bg-gray-51 my-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                  focus:border-blue-500 blockp-2.5 dark:bg-gray-700 dark:border-gray-600
                  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  value="{{$detalle->$tareas}}"
                  />
                </div>
              </td>
              <td>
                <div class="flex justify-center w-full">
                  <input type="text" id="{{" curso_examen_{$detalle->curso->id}"}}"
                  name="{{"curso_examen_{$detalle->curso->id}"}}"
                  class="bg-gray-51 my-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                  focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600
                  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  value="{{$detalle->$examen}}"
                  />
                </div>
              </td>
              <td>
                <div class="flex justify-center w-full">
                  <input type="text" id="{{" curso_total_{$detalle->curso->id}"}}"
                  name="{{"curso_total_{$detalle->curso->id}"}}"
                  class="bg-gray-51 my-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                  focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600
                  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  value="{{$detalle->$total}}" readonly
                  />
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="flex justify-end my-2">
          <p class="font-bold text-base md:text-xl text-gray-800 dark:text-gray-200">
            Promedio General {{number_format($notas->promedio, 0, ',', '.')}}
          </p>
        </div>
        <div class="flex justify-center my-10">
          <button class="rounded-md p-2 bg-blue-600 dark:bg-blue-700 text-gray-200">
            Actualizar notas
          </button>
        </div>
      </form>
    </div>
  </div>
</x-app-layout>