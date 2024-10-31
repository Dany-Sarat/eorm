<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div
                class="block max-w-4xl mx-auto p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    Datos Generales
                </h5>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Docentes registrados
                                </th>
                                <td class="px-6 py-4">
                                    {{$docentes}}
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Alumnos registrados
                                </th>
                                <td class="px-6 py-4">
                                    {{$alumnos}}
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Grados
                                </th>
                                <td class="px-6 py-4">
                                    {{$totalGrados}}
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Secciones activas
                                </th>
                                <td class="px-6 py-4">
                                    {{$totalSecciones}}
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Alumno con mejor nota
                                </th>
                                <td class="px-6 py-4">
                                    {{$mejorNota}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <h2 class="font-bold text-base md:text-2xl dark:text-gray-200 text-gray-800 my-5">
                    Mejor promedio por seccion
                </h2>
                @if(count($mejorPorSeccion) > 0)
                <div class="relative overflow-x-auto my-5">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <tbody>
                            @foreach ($mejorPorSeccion as $mejor)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$mejor['seccion']}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$mejor['nombre_alumno']}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="my-5 mx-auto max-w-xl">
                    <h3 class="font-bold text-center text-gray-800 dark:text-gray-200">
                        DATOS NO DISPONIBLES
                    </h3>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>