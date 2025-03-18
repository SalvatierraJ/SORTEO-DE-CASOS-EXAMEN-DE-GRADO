<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    @vite(['public/css/barra.css'])
    @vite(['public/css/menu.css'])
    @vite(['public/css/gestionestudiantes.css'])
    <title>Gestion de estudiantes</title>
</head>

<body style="overflow: hidden;background-color: aliceblue;">
    <div class="contenedor-padre">
        <x-menulateral>
        </x-menulateral>

        <section class="contenido-estudiantes">
            <div class="posicion">
                @if (session('success'))
                    <x-alert type="success" :message="session('success')" />
                @endif

                @if ($errors->any())
                    <x-alert type="error" :message="$errors->all()" />
                @endif

                <!-- 🔹 FILTROS DINÁMICOS -->
                <div class="Elecciones">
                    <form method="GET" action="{{ route('gestion.estudiante') }}" class="Elecciones-div flex gap-4">
                        <!-- 🔹 FILTRO POR CARRERA -->
                        <select name="carrera" id="carreras" class="p-2 border rounded">
                            <option value="">Todas las Carreras</option>
                            @foreach ($carreras as $carrera)
                                <option value="{{ $carrera->id_carrera }}"
                                    {{ request('carrera') == $carrera->id_carrera ? 'selected' : '' }}>
                                    {{ $carrera->nombre_carrera }}
                                </option>
                            @endforeach
                        </select>

                        <!-- 🔹 FILTRO POR ESTADO DE DEFENSA INTERNA -->
                        <select name="estado_interna" id="estado_interna" class="p-2 border rounded">
                            <option value="">Estado Defensa Interna</option>
                            <option value="Pendiente" {{ request('estado_interna') == 'Pendiente' ? 'selected' : '' }}>
                                Pendiente</option>
                            <option value="Asignada" {{ request('estado_interna') == 'Asignada' ? 'selected' : '' }}>
                                Asignada</option>
                            <option value="Aprobada" {{ request('estado_interna') == 'Aprobada' ? 'selected' : '' }}>
                                Aprobada</option>
                        </select>

                        <!-- 🔹 FILTRO POR ESTADO DE DEFENSA EXTERNA -->
                        <select name="estado_externa" id="estado_externa" class="p-2 border rounded">
                            <option value="">Estado Defensa Externa</option>
                            <option value="Pendiente" {{ request('estado_externa') == 'Pendiente' ? 'selected' : '' }}>
                                Pendiente</option>
                            <option value="Asignada" {{ request('estado_externa') == 'Asignada' ? 'selected' : '' }}>
                                Asignada</option>
                            <option value="Aprobada" {{ request('estado_externa') == 'Aprobada' ? 'selected' : '' }}>
                                Aprobada</option>
                        </select>

                        <button type="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Filtrar</button>
                    </form>
                </div>

                <!-- 🔹 BOTÓN DE AGREGAR -->
                <div class="agregar flex justify-between items-center">
                    <div class="div-agregar" data-modal-target="static-modal" data-modal-toggle="static-modal">
                        <img src="{{ asset('img/agregar_usuario.jpg') }}" class="image-agregar">
                    </div>
                    <div class="Gestion-h3">
                        <h3 class="gestion-h3">Gestión de Estudiantes</h3>
                    </div>
                </div>

                <!-- 🔹 TABLA DE ESTUDIANTES -->
                <div class="shadow-md sm:rounded-lg p-4">
                    <div>
                        <table class="w-full text-sm text-left text-gray-700 border">
                            <thead class="text-xs text-white uppercase bg-[#3F5675]">
                                <tr>
                                    <th class="px-4 py-2">CÓDIGO</th>
                                    <th class="px-4 py-2">NOMBRE COMPLETO</th>
                                    <th class="px-4 py-2">CORREO</th>
                                    <th class="px-4 py-2">CELULAR</th>
                                    <th class="px-4 py-2">FACULTAD</th>
                                    <th class="px-4 py-2">CARRERA</th>
                                    <th class="px-4 py-2">DEFENSA INTERNA</th>
                                    <th class="px-4 py-2">DEFENSA EXTERNA</th>
                                    <th class="px-4 py-2">EDITAR</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($estudiantes as $estudiante)
                                    <tr
                                        class="@if ($loop->even) bg-[#F2F2F2] @else bg-white @endif border-b hover:bg-gray-100">
                                        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $estudiante['registro'] }}
                                        </td>
                                        <td class="px-4 py-2">
                                            {{ $estudiante['nombre_completo'] }}
                                        </td>
                                        <td class="px-4 py-2">
                                            {{ $estudiante['correo'] }}
                                        </td>
                                        <td class="px-4 py-2">
                                            {{ $estudiante['telefono'] }}
                                        </td>
                                        <td class="px-4 py-2">
                                            {{ $estudiante['facultad'] }}
                                        </td>
                                        <td class="px-4 py-2">
                                            {{ $estudiante['carrera'] }}
                                        </td>
                                        <!-- 🔹 Estado Defensa Interna -->
                                        <td class="px-4 py-2">
                                            <span
                                                class="px-2 py-1 rounded text-white text-xs font-bold {{ $estudiante['estado_defensa_interna'] == 'Defensa Interna Aprobada' ? 'bg-green-500' : ($estudiante['estado_defensa_interna'] == 'Defensa Interna Asignada' ? 'bg-yellow-500' : 'bg-red-500') }}">
                                                {{ $estudiante['estado_defensa_interna'] }}
                                            </span>
                                        </td>
                                        <!-- 🔹 Estado Defensa Externa -->
                                        <td class="px-4 py-2">
                                            <span
                                                class="px-2 py-1 rounded text-white text-xs font-bold {{ $estudiante['estado_defensa_externa'] == 'Defensa Externa Aprobada' ? 'bg-green-500' : ($estudiante['estado_defensa_externa'] == 'Defensa Externa Asignada' ? 'bg-yellow-500' : 'bg-red-500') }}">
                                                {{ $estudiante['estado_defensa_externa'] }}
                                            </span>
                                        </td>
                                        <!-- 🔹 Botón de Editar -->
                                        <td class="px-4 py-2 text-right">
                                            <a href="#" class="font-medium text-blue-600 hover:underline">
                                                <img class="editar-imagen w-6 h-6"
                                                    src="https://img.icons8.com/officel/80/create-new.png"
                                                    alt="Editar" />
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="px-4 py-2 text-center text-gray-500">
                                            No se encontraron estudiantes.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- 🔹 PAGINACIÓN -->
                
            </div>
        </section>

    </div>


    <!-- Modal Registrar estudiante -->
    <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Registrar Estudiante
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="static-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form method="POST" action="{{ route('registrar.Estudiante') }}" enctype="multipart/form-data"
                    class="space-y-4">
                    @csrf
                    <div class="p-4 md:p-5 space-y-4">
                        <div>
                            <label for="registro"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-400">Registro</label>
                            <input type="text" name="registro" id="registro"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        </div>
                        <div>
                            <label for="Nombre"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-400">Nombre</label>
                            <input type="text" name="Nombre" id="Nombre"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        </div>
                        <div>
                            <label for="Apellido"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-400">Apellido</label>
                            <input type="text" name="Apellido" id="Apellido"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        </div>
                        <div>
                            <label for="Carrera"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-400">Carrera</label>
                            <select id="Carrera" name="Carrera" style="height: 50px;"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="0">Selecciona una carrera</option>
                                @foreach ($carreras as $carrera)
                                    <option value="{{ $carrera->id_carrera }}">{{ $carrera->nombre_carrera }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="Telefono"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-400">Teléfono</label>
                            <input type="text" name="Telefono" id="Telefono"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        </div>
                        <div>
                            <label for="Correo"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-400">Correo</label>
                            <input type="text" name="Correo" id="Correo"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        </div>
                        <div class="mt-4">
                            <label for="file-upload"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-400">Agregar más de un
                                estudiante (.csv o .xlsx)</label>
                            <input name="archivoEstudiantes" type="file" id="file-upload"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit" data-modal-hide="static-modal" type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Guardar
                        </button>
                        <button data-modal-hide="static-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>
<script>
    setTimeout(() => {
        const alert = document.getElementById('alert');
        if (alert) {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500); // Remover el elemento después de que se desvanezca
        }
    }, 10000);
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"
    integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw=="
    crossorigin="anonymous"></script>
@vite(['resources/js/menu.js'])
@vite(['node_modules/flowbite/dist/flowbite.min.js'])

</html>
