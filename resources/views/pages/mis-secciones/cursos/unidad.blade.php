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