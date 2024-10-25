<x-app-layout>
  <div class="container px-2 mx-auto py-5">

    <h1 class="text-gray-800 dark:text-gray-200 text-base md:text-xl ">
      Crear usuario
    </h1>
  </div>

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

  <div class="py-5 max-w-4xl mx-auto">

    <h2 class="mt-3 mb-2 dark:text-gray-200 text-gray-800 border-b border-b-2 border-b-gray-600">
      Editar grado
    </h2>

    <form action="{{route('grados.actualizar', $grado->id)}}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-5 flex gap-2">
        <label for="nombre" class="block text-sm font-medium text-gray-900 dark:text-white">Grado</label>
        <input type="text" id="nombre" name="nombre"
          class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
          placeholder="Nombre grado" value="{{$grado->nombre}}" />
      </div>
      <div class="mb-5 flex gap-2">
        <label for="anio_asignacion" class="block text-sm font-medium text-gray-900 dark:text-white">Año de
          asignación</label>
        <input type="text" id="anio_asignacion" name="anio_asignacion"
          class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
          placeholder="Nombre grado" value="{{$grado->anio_asignacion}}" readonly />
      </div>
  

      {{-- Secciones --}}
      <div x-data="{
            items: {{json_encode($grado->secciones)}},
            docentes: {{json_encode($docentes)}},
            options: 0,
            addItem() {
                this.items++
            }
        }">

        <template x-for="(option, index) in items">

          <div class=" p-4 mt-5 mx-auto rounded-md bg-slate-300 dark:bg-slate-700 ">

            <input type="hidden" x-bind:value="`${option.id}`" x-bind:name="`seccion_id_${index}`" />

            <label for="name" class="block text-sm font-medium text-gray-900 dark:text-white">Descripción
              sección</label>

            <input type="text" x-bind:id="`seccion_nombre_${index}`" x-bind:name="`seccion_nombre_${index}`"
              class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
              placeholder="Nombre seccion" x-bind:value="`${option.nombre}`" />

            <div class="mb-5">
              <label for="docente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Docente
              </label>

              <select x-bind:id="`seccion_docente_${index}`" x-bind:name="`seccion_docente_${index}`"
                x-model="option.docente_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                @foreach ($docentes as $docente)
                <option value="{{$docente->id}}">
                  {{$docente->infoUsuario->nombres}} {{$docente->infoUsuario->apellidos}}
                </option>
                @endforeach
              </select>
            </div>

          </div>

      </div>
      </template>

      <h2 class="text-gray-800 dark:text-gray-200 md:text-lg text-base mt-5">
        Cursos asignados
      </h2>

      <div class="dark:bg-gray-600 mt-5 p-2 rounded-md bg-gray-200 max-w-xl mx-auto flex gap-2 flex-wrap">
        @foreach ($cursos as $curso)

        <label class="text-xs md:text-sm text-gray-800 dark:text-gray-200" for="{{'curso_' . $curso->id}}">

          <input type="checkbox" name="{{'curso_' . $curso->id}}" id="{{'curso_' . $curso->id}}" value="{{$curso->id}}"
            @checked($grado->tieneCurso($curso->id) ? true : false)
          />

          {{$curso->nombre}}
        </label>

        @endforeach
      </div>
  </div>

  <button type="submit"
    class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
    Actualizar
  </button>

  </form>


  </div>

</x-app-layout>