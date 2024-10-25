<x-app-layout>

  <div class="max-w-5xl mx-auto">
    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400 my-5">
      <li class="me-2">
        <a href="{{route('mis_secciones.unidad', ['seccion' => $seccion->id, 'id' => $id])}}"
          class="{{(request()->routeIs('mis_secciones.unidad') ? ' bg-blue-600 ' : ' ') .  ' inline-block px-4 py-3 text-white rounded-lg' }}">
          Listado
        </a>
      </li>
      <li class="me-2">
        <a href="{{route('mis_secciones.cursos.index', ['seccion' => $seccion->id, 'id' => $id])}}"
          class="{{(request()->routeIs('mis_secciones.cursos.index') ? ' bg-blue-600 ' : ' ') .  ' inline-block px-4 py-3 text-white bg-blue-600 rounded-lg' }}">
          Cursos
        </a>

      </li>
    </ul>

    <h1 class="text-gray-800 dark:text-gray-200 my-5 font-bold text-base md:text-xl">
      Administración notas {{$seccion->grado->nombre}} Seccion {{$seccion->nombre}} Unidad {{$id}}
    </h1>

    <div class="relative overflow-x-auto max-w-6xl mx-auto my-5 text-gray-800 dark:text-gray-200">
      <table class="w-full">
        <thead>
          <tr>
            <th class="text-left">Alumno</th>
            <th class="text-left">Administrar</th>
          </tr>
        </thead>
        <tbody>


          @foreach ($seccion->alumnos as $alumno)
          <tr>
            <td>{{$alumno->nombre}} {{$alumno->apellido}}</td>
            <td>
              <div class="flex justify-center">
                <a class="p-2 bg-blue-700 text-gray-200 rounded-md" href="{{route("mis_secciones.cursos.ver",
                  [ 'seccion'=> $seccion->id,
                  'id' => $id,
                  'alumno' => $alumno->id,
                  ])}}"
                  >
                  Administrar
                </a>

              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>


    </div>


  </div>
</x-app-layout>