<x-app-layout>
  <div class="container px-2 mx-auto py-5">
    <h1 class="text-gray-800 dark:text-gray-200 text-base md:text-xl ">
      Crear usuario
    </h1>
  </div>
  <div class="py-5 max-w-4xl mx-auto">
      <h2 class="mt-3 mb-2 dark:text-gray-200 text-gray-800 border-b border-b-2 border-b-gray-600">
        Agregar nuevo grado
      </h2>
    <form action="{{route('grados.guardar')}}" method="POST">
      @csrf  
      <div class="mb-5 flex gap-2">
        <label for="nombre" class="block text-sm font-medium text-gray-900 dark:text-white">Grado</label>
        <input type="text" id="nombre" name="nombre"
          class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
          placeholder="Nombre grado" />
      </div>
      <div
        x-data="{
            items: 0,
            options: 0,
            addItem() {
                this.items++
            }
        }" 
      >
        <div class="flex justify-end">
            <button class="bg-blue-700 text-gray-200 p-2 rounded-md"
                type="button"
                @click="addItem"
            >
                Agregar Sección
            </button>
        </div>
        
        <template x-for="(options, index) in items">
            <div>
<div class=" p-4 mt-5 mx-auto rounded-md bg-slate-300 dark:bg-slate-700 ">
        <label for="name" class="block text-sm font-medium text-gray-900 dark:text-white">Descripción sección</label>
        
        <input type="text" x-bind:id="`seccion_nombre_${index}`" x-bind:name="`seccion_nombre_${index}`"
          class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
          placeholder="Nombre seccion" 
          />
<div class="mb-5">
        <label for="docente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
          Docente
        </label>
        <select x-bind:id="`seccion_docente_${index}`" x-bind:name="`seccion_docente_${index}`"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        
            @foreach($docentes as $docente)
            
                <option value="{{$docente->id}}">
                    {{$docente->infoUsuario->nombres}} {{$docente->infoUsuario->apellidos}}
                </option>
            @endforeach
        
        </select>
      </div>
        </div>
      
            </div>
        </template>
        
        
      </div>
      <button type="submit"
        class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Crear
      </button>
    </form>
  </div>
</x-app-layout>