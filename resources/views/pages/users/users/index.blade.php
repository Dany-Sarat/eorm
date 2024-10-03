<x-app-layout>
  <div class="max-w-7xl mx-auto py-5">
  <h1 class="dark:text-gray-200 text-gray-800 text-base md:text-xl ">
    Gestion de usuarios
  </h1>
  <div class="w-full flex justify-end">
    <a 
    type="button"
    href="{{route('users.crear')}}"
    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
    
    >
    Crear usuario
  </a> 
  </div>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg my-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                  Email
                </th>
                <th scope="col" class="px-6 py-3">
                  Rol 
                </th>
                <th scope="col" class="px-6 py-3">
                  Otros
                </th>
            </tr>
        </thead>
        <tbody>
          @foreach ($usuarios as $usuario)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{$usuario->email}}
                </th>
                <td class="px-6 py-4">
                  {{$usuario->rol}}
                </td>
                <td class="px-6 py-4">
                  <a 
                  href="{{route('users.ver', $usuario->id)}}"
                  class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900"
                  >
                  Ver
                </button>
                </td>
            </tr>
          @endforeach 
        </tbody>
    </table>
    <div class="mt-5">
      {{$usuarios->links()}}
    </div>
</div>
  </div>
</x-app-layout>