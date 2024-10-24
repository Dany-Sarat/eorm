<x-app-layout>
  <div class="container px-2 mx-auto py-5">
    <h1 class="text-gray-800 dark:text-gray-200 text-base md:text-xl ">
      Editar Curso
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
  <div class="py-5 max-w-2xl mx-auto">
    
  
  {{-- <div x-data="{
        

        confirm() {
          const form = document.getElementById('form');
          const validacion = confirm('¿Está seguro que desea eliminar este curso?'); 
          
          if (validacion) {
            form.submit();
          }
        }
      }" class="flex justify-end">
      <form  method="POST" action="{{route('cursos.eliminar', $curso->id)}}" id="form" @submit.prevent="confirm">
        @csrf
        @method('DELETE')
        <button type="submit"
          class="ml-5 text-white mt-5 bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-blue-800">
          Eliminar
        </button>
      </form>
    </div> --}}


    @if($errors->any())
    @foreach ($errors->all() as $item)
    <div class="mx-auto w-full">
      <x-input-error messages="{{$item}}" />
    </div>
    @endforeach
    @endif
    <form class="max-w-xl mx-auto" action="{{route('cursos.actualizar', $curso->id)}}" method="POST">
      @csrf
      @method('PUT')
      <label for="nombre" class="block mb-2 mt-10 text-sm font-medium text-gray-900 dark:text-white">Curso</label>
      <input type="text" id="nombre" name="nombre"
        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
        placeholder="Nombre curso" value="{{$curso->nombre}}" />
      <button type="submit"
        class="text-white mt-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Actualizar
      </button>
    </form>
  </div>
</x-app-layout>