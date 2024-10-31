@php
use \App\Common\Formacion;
use \App\Common\Rol;
use \App\Common\Contrato;
@endphp

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
    <form class="max-w-xl mx-auto" action="{{route('users.guardar')}}" method="POST">
      @csrf

      <h2 class="mt-3 mb-2 dark:text-gray-200 text-gray-800 border-b border-b-2 border-b-gray-600">
        Información de usuario
      </h2>


      <div class="mb-5 flex gap-2">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
        <input type="email" id="email" name="email"
          class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
          placeholder="user@example.test" />


        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
          Contraseña
        </label>
        <input type="password" id="password" name="password"
          class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
          placeholder="******" />
      </div>

      <div class="mb-5">

        <label for="rol" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
          Rol
        </label>
        <select id="rol" name="rol"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <option value="{{Rol::DIRECTOR}}">
            {{Rol::DIRECTOR->value}}
          </option>
          <option value="{{Rol::DOCENTE}}">
            {{Rol::DOCENTE->value}}
          </option>
        </select>
      </div>


      <h2 class="mt-5 mb-2 dark:text-gray-200 text-gray-800 border-b border-b-2 border-b-gray-600">
        Información personal
      </h2>

      <div class="mb-5 flex gap-2">
        <label for="nombres" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombres</label>
        <input type="text" name="nombres" id="nombres"
          class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
          placeholder="Nombres" />


        <label for="apellidos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellidos</label>
        <input type="text" id="apellidos" name="apellidos"
          class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
          placeholder="Apellidos" />
      </div>

      <div class="mb-5">
        <label for="fecha_nacimiento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
          Fecha de nacimiento
        </label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"
          class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
          placeholder="edad" />
      </div>


      <h2 class="mt-5 mb-2 dark:text-gray-200 text-gray-800 border-b border-b-2 border-b-gray-600">
        Información académica
      </h2>

      <div class="mb-5 flex gap-2">

        <div class="w-1/2">

          <label for="formacion_academica"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">formación
            académica</label>
          <select id="formacion_academica" name="formacion_academica"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

            @foreach (Formacion::cases() as $formacion)
            <option value={{$formacion->name}}>
              {{$formacion->value}}
            </option>             
            @endforeach

          </select>
        </div>

        <div class="w-1/2">

          <label for="inicio_laboral" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Inicio a laborar el
          </label>
          <input type="date" id="inicio_laboral" name="inicio_laboral"
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" />
        </div>
      </div>

      <div class="mb-5">

      <label for="tipo_contrato" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de contrato</label>
        <select id="tipo_contrato" name="tipo_contrato"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <option value="{{Contrato::CONTRATO}}">
            {{Contrato::CONTRATO->value}}
          </option>
          <option value="{{Contrato::PRESUPUESTADO}}">
            {{Contrato::PRESUPUESTADO->value}}
          </option>
        </select>
      </div>

      <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Crear
      </button>
    </form>

  </div>

</x-app-layout>