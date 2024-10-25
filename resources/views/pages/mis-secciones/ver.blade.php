<x-app-layout>

  <div class="max-w-5xl mx-auto">

    <h1 class="font-bold text-base lg:text-xl dark:text-gray-200 text-gray-800 my-5">
      {{$seccion->grado->nombre}} Sección {{$seccion->nombre}}
    </h1>
  </div>


  <div class="max-w-5xl mx-auto justify-center items-center flex flex-col gap-2 lg:flex-row flex-wrap my-5">

    @for ($i = 1; $i < 5; $i++) <div
      class="w-full md:w-2/4  p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
      <h2 class="mb-3 font-normal text-gray-700 dark:text-gray-200">
        Unidad {{$i}}
      </h2>
      <a href="{{route('mis_secciones.unidad', ['seccion' => $seccion->id, 'id' => $i])}}"
        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Administrar
        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
          viewBox="0 0 14 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M1 5h12m0 0L9 1m4 4L9 9" />
        </svg>
      </a>
  </div>
  @endfor

  </div>

</x-app-layout>