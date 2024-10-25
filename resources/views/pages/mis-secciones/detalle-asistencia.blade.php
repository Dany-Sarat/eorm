<x-app-layout>

  <div class="max-w-5xl mx-auto bg-slate-200 dark:bg-slate-700 p-4 my-5 rounded-md">

    <h1 class="font-bold text-xl text-gray-800 dark:text-gray-200">
      Asistencia del {{$asistencia->fecha_toma_asistencia->format('d-m-Y')}}
    </h1>

    {{-- @foreach ($asistencia->asistenciaDetalles as $detalle) --}}
    <div class="relative overflow-x-auto max-w-6xl mx-auto my-5 text-gray-800 dark:text-gray-200"> 
      <table class="w-full">
      <thead>
        <tr>
          <th class="text-left">Alumno</th>
          <th class="text-left">Ausente/Presente</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($asistencia->asistenciaDetalles as $detalle)
        <tr>
          <td>{{$detalle->alumno->nombre}} {{$detalle->alumno->apellido}}</td>
          <td>

            <label class="inline-flex items-center cursor-pointer">
              <input type="checkbox" name="asistencia_estado_{{$detalle->alumno->id}}" class="sr-only peer"
              @checked($detalle->estado == true)
              disabled
              >
              <div
                class="relative w-12 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
              </div>
            </label>
            {{-- <input type="hidden" value="{{$detalle->alumno->id}}" name="asistencia_alumno_{{$detalle->alumno->id}}" /> --}}
          </td>
        </tr>
        @endforeach
      </tbody>
      </table>
    </div>

    {{-- @endforeach --}}

  </div>

</x-app-layout>