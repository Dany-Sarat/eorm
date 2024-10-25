<x-app-layout>

  <div class="max-w-5xl mx-auto">

    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400 my-5">
      <li class="me-2">
        <a href="{{route('mis_secciones.unidad', ['seccion' => $seccion->id, 'id' => $id])}}"
          {{-- class="{{(request()->routeIs('mis_secciones.unidad')) .  ' inline-block px-4 py-3 text-white bg-blue-600 rounded-lg' . (request()->routeIs('mis_secciones.unidad')) ? ' active ' : ' '  }}" aria-current="page"  --}}
          class="{{(request()->routeIs('mis_secciones.unidad') ? ' bg-blue-600 ' : ' ') .  ' inline-block px-4 py-3 text-white rounded-lg' }}" 
          >
          Listado
        </a>
      </li>
      <li class="me-2">
        <a href="{{route('mis_secciones.cursos.index', ['seccion' => $seccion->id, 'id' => $id])}}"

          class="{{(request()->routeIs('mis_secciones.cursos.index') ? ' bg-blue-600 ' : ' ') .  ' inline-block px-4 py-3 text-white rounded-lg' }}" >
          Cursos
        </a>

      </li>
    </ul>


    <h1 class="font-bold text-base lg:text-xl dark:text-gray-200 text-gray-800 my-5">
      Asistencias {{$seccion->grado->nombre}} Sección {{$seccion->nombre}} Unidad {{$id}}
    </h1>

    <div x-data="{
        elementos: [],
        id: 1,
        agregarNuevo() {
          this.elementos.unshift({
            id: this.id++,
            fecha: null,
            estado: false,
            estaExpandido: false,
          });
        },
        remover(id) {
            const confirmar = confirm('¿Está seguro que desea eliminar esta página?');
            
            if (confirmar) {
              this.elementos = this.elementos.filter(elemento => elemento.id !== id);
            }
       
        }
      }">

      <div class="flex justify-end">
        <button class="text-gray-800 dark:text-gray-200 p-2 bg-blue-600 dark:bg-blue-700 rounded-md"
          @click="agregarNuevo">Agregar nuevo</button>
      </div>

      <template x-for="(elemento, index) in elementos" :key="elemento.id">
        <div class="dark:bg-slate-700 bg-slate-200 rounded-md p-2 mb-5">

          <div class="flex ">
            <button class="p-2 bg-red-600 dark:bg-red-700 text-gray-200 rounded-md mb-5"
              @click="remover(elemento.id)">remover</button>
          </div>
          <form action="{{route('mis_secciones.registrar_asistencia', $seccion->id)}}" method="POST">
            @csrf

            <div>
              <label for="fecha_asistencia" class="block mb-3 text-sm font-medium text-gray-900 dark:text-white">
                Fecha toma de asistencia
              </label>
              <input x-model="elemento.fecha" type="date" id="fecha_asistencia" name="fecha_asistencia"
                class="bg-gray-51 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            </div>

            <div>
              <button class="bg-green-601 dark:bg-green-700 text-gray-200 p-2 rounded-md my-5" type="button"
                @click="elemento.estaExpandido=!elemento.estaExpandido">
                Expandir/ocultar
              </button>
            </div>

            {{-- unidad --}}
            <input type="hidden" id="unidad" name="unidad" value="{{$id}}" />

            <div class="relative overflow-x-auto max-w-6xl mx-auto my-5 text-gray-800 dark:text-gray-200"
              x-show="elemento.estaExpandido">
              <table class="w-full">
                <thead>
                  <tr>
                    <th class="text-left">Alumno</th>
                    <th class="text-left">Ausente/Presente</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($seccion->alumnos as $alumno)
                  <tr>
                    <td>{{$alumno->nombre}} {{$alumno->apellido}}</td>
                    <td>

                      <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="asistencia_estado_{{$alumno->id}}" class="sr-only peer">
                        <div
                          class="relative w-12 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                        </div>
                        {{-- <span
                          class="ms-4 text-sm font-medium text-gray-900 dark:text-gray-300">Ausente/Presente</span> --}}
                      </label>
                      <input type="hidden" value="{{$alumno->id}}" name="asistencia_alumno_{{$alumno->id}}" />
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>


              <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-5">
                Registrar
              </button>
            </div>


          </form>

        </div>
      </template>

    </div>


    <h2 class="dark:text-gray-200 text-gray-800 font-bold text-xl">
      Asistencias tomadas
    </h2>

    <div class="relative overflow-x-auto max-w-6xl mx-auto my-5 text-gray-800 dark:text-gray-200"
      x-show="elemento.estaExpandido">
      <table class="w-full">
        <thead>
          <tr>
            <th class="text-left">Fecha</th>
            <th class="text-left">Acciones</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($asistencias as $asistencia)
          <tr>
            <td>
              {{$asistencia->fecha_toma_asistencia->format('d-m-Y')}}
            </td>
            <td class="p-2">

              <a href="{{route('mis_secciones.asistencia.detalle', ['seccion' => $seccion->id, 'id' => $asistencia->id])}}"
                class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm p-2 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                Ver
              </a>

            </td>
          </tr>
          @endforeach 
      </table>
    </div>
  </div>


</x-app-layout>