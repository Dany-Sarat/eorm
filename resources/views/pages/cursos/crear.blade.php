<x-app-layout>
  <div class="py-5 max-w-2xl mx-auto">
    @if($errors->any())
    @foreach ($errors->all() as $item)
    <div class="mx-auto w-full">
      <x-input-error messages="{{$item}}" />
    </div>
    @endforeach
    @endif
    <form class="max-w-xl mx-auto" action="{{route('cursos.guardar')}}" method="POST">
      @csrf
      <h2 class="mt-3 mb-2 dark:text-gray-200 text-gray-800 border-b border-b-2 border-b-gray-600">
        Información de curso
      </h2>
      <label for="nombre" class="block mb-2 mt-10 text-sm font-medium text-gray-900 dark:text-white">Curso</label>
      <input type="text" id="nombre" name="nombre"
        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
        placeholder="Nombre curso" />
      <button type="submit"
        class="text-white mt-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Crear
      </button>
    </form>
  </div>
</x-app-layout>