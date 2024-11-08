<x-app-layout>
    <div class="container px-2 mx-auto py-5">
        <h1 class="text-gray-800 dark:text-gray-200 text-base md:text-xl ">
            Editar usuario
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
    <div class="py-5 max-w-2xl mx-auto">
    <h1 class="font-bold text-base md:text-xl text-gray-800 dark:text-gray-200">
            Actualmente en {{$alumno->grado_actual}}
        </h1>
        <form class="max-w-xl mx-auto" action="{{route('alumnos.actualizar', $alumno->id)}}" method="POST">
            @csrf
            @method('PUT')
            <h2 class="mt-3 mb-2 dark:text-gray-200 text-gray-800 border-b border-b-2 border-b-gray-600">
                Registro de alumno
            </h2>
            <div class="mb-5 flex gap-2">
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombres</label>
                <input type="text" id="nombre" name="nombre"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="Nombres" value={{$alumno->nombre}}
                />
                <label for="apellido" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Apellidos
                </label>
                <input type="text" id="apellido" name="apellido"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="Apellidos" value="{{$alumno->apellido}}" />
            </div>
            <div class="mb-5 flex gap-2">
                <label for="codigo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Código</label>
                <input type="text" name="codigo" id="codigo"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="Codigo" value="{{$alumno->codigo}}" @disabled(true) />
                <label for="telefono"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono</label>
                <input type="text" id="telefono" name="telefono"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="00000000" value="{{$alumno->telefono}}" />
            </div>
            <div class="mb-5">
                <label for="correo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">

                    Correo Electrónico (opcional)
                </label>
                <input type="text" id="correo" name="correo"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="alumno@correo.com" value="{{$alumno->correo}}" />
            </div>
            <div class="mb-5 flex gap-2">
                <div class="w-1/2">
                    <label for="nombre_encargado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nombres encargado
                    </label>
                    <input type="text" name="nombre_encargado" id="nombre_encargado"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="Nombre encargado" value="{{$alumno->nombre_encargado}}" />
                </div>
                <div class="w-1/2">
                    <label for="apellido_encargado"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Apellidos encargado
                    </label>
                    <input type="text" id="apellido_encargado" name="apellido_encargado"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="Apellido encargado" value="{{$alumno->apellido_encargado}}" />
                </div>
            </div>
            <div class="mb-5 flex flex-col gap-2">
                <label for="fecha_nacimiento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Edad
                </label>
                <input type="text" name="fecha_nacimiento" id="fecha_nacimiento"
                    value="{{$alumno->fecha_nacimiento->diff(now())->format('%y años')}}"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    @disabled(true) />
            </div>
            <div class="mb-5 flex flex-col gap-2">
                <label for="seccion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asignar
                    grado/seccion</label>
                <select id="seccion" name="seccion"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    >
                    @foreach ($secciones as $seccion)
                    <option value={{$seccion->id}}
                    {{-- selected="{{$seccion->id == $alumno->seccion_id}}" --}}
                    @selected($seccion->id == $alumno->seccion_id)
                        @disabled($seccion->id != $alumno->seccion_id) 
                        >
                        {{$seccion->grado->nombre}} - {{$seccion->nombre}}
                    </option>
                    @endforeach
                </select>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none 
                focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600
                 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Actualizar
            </button>
        </form>
    </div>
</x-app-layout> 