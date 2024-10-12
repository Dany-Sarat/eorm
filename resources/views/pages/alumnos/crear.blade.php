<x-app-layout>
  <div class="container px-2 mx-auto py-5">
    <h1 class="text-gray-800 dark:text-gray-200 text-base md:text-xl ">
      Crear usuario
    </h1>
  </div>
  @error('creacion_fallida')
  <span class="dark:text-red-500 text-red-700 text-center my-5 mx-auto block">
    {{$message}}
  </span>
  @enderror
  <div class="py-5 max-w-2xl mx-auto">
    <form class="max-w-xl mx-auto" action="{{route('alumnos.guardar')}}" method="POST">
      @csrf
      <h2 class="mt-3 mb-2 dark:text-gray-200 text-gray-800 border-b border-b-2 border-b-gray-600">
        Registro de alumno
      </h2>
      <div class="mb-5 flex gap-2">
        <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombres</label>
        <input type="text" id="nombre" name="nombre"
          class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
          placeholder="Nombres" />
        <label for="apellido" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
          Apellidos
        </label>
        <input type="text" id="apellido" name="apellido"
          class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
          placeholder="Apellidos" />
      </div>
      <div class="mb-5 flex gap-2">
        <label for="codigo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Código</label>
        <input type="text" name="codigo" id="codigo"
          class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
          placeholder="Codigo" />
        <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono</label>
        <input type="text" id="telefono" name="telefono"
          class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
          placeholder="00000000" />
      </div>
      <div class="mb-5">
        <label for="correo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
          Correo Electrónico
        </label>
        <input type="text" id="correo" name="correo"
          class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
          placeholder="alumno@correo.com" />
      </div>
      <div class="mb-5 flex gap-2">
        <div class="w-1/2">
          <label for="nombre_encargado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Nombres encargado
          </label>
          <input type="text" name="nombre_encargado" id="nombre_encargado"
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
            placeholder="Nombre encargado" />
        </div>
        <div class="w-1/2">
          <label for="apellido_encargado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Apellidos encargado
          </label>
          <input type="text" id="apellido_encargado" name="apellido_encargado"
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
            placeholder="Apellido encargado" />
        </div>
      </div>
      <div class="mb-5 flex flex-col gap-2">
        <label for="fecha_nacimiento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
          Fecha de nacimiento
        </label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento"
          class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" />
      </div>
      <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Crear
      </button>
    </form>
  </div>
</x-app-layout>