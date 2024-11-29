<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Evaluaciones</title>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    @vite(['public/css/barra.css'])
    @vite(['public/css/menu.css'])
    <style>

    </style>
</head>

<body class="flex min-h-screen" style="overflow: hidden; background-color: aliceblue;" id="vistaTribunal">

    <x-menulateral>

    </x-menulateral>
    @if (session('success'))
        <x-alert type="success" :message="session('success')" />
    @endif

    @if ($errors->any())
        <x-alert type="error" :message="$errors->all()" />
    @endif
    <main id="main-content" class="flex-grow p-6 transition-all duration-300 bg-gray-100 overflow-auto"
        style="background-color: aliceblue; height: 100vh;">
        <div class="max-w-7xl mx-auto p-10">
            <div class="text-center mb-12">
                <h1 class="text-5xl font-extrabold text-gray-800 mb-4">DEFENSAS</h1>
                <p class="text-lg text-gray-600">Área para registrar las calificaciones finales de las defensas de
                    grado.</p>
            </div>
            <!-- Header -->

            <!-- Buscar estudiantes -->
            <div class="flex justify-center mb-10">
                <div class="flex w-full max-w-lg bg-gray-200 rounded-full overflow-hidden shadow-md">
                    <input type="text" placeholder="Buscar estudiantes" id="buscarDefensa" onkeyup="buscarDefensas()"
                        class="w-full p-4 bg-gray-200 outline-none rounded-full text-gray-700">

                </div>
            </div>

            <!-- Tabla de estudiantes -->
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-white uppercase bg-[#000000] dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="p-4">
                                <button class="p-3 text-white hover:bg-red-800 transition-all duration-300 rounded-lg"
                                    data-modal-target="agregarTribunal" data-modal-toggle="agregarTribunal">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 3v17.25m0 0c-1.472 0-2.882.265-4.185.75M12 20.25c1.472 0 2.882.265 4.185.75M18.75 4.97A48.416 48.416 0 0 0 12 4.5c-2.291 0-4.545.16-6.75.47m13.5 0c1.01.143 2.01.317 3 .52m-3-.52 2.62 10.726c.122.499-.106 1.028-.589 1.202a5.988 5.988 0 0 1-2.031.352 5.988 5.988 0 0 1-2.031-.352c-.483-.174-.711-.703-.59-1.202L18.75 4.971Zm-16.5.52c.99-.203 1.99-.377 3-.52m0 0 2.62 10.726c.122.499-.106 1.028-.589 1.202a5.989 5.989 0 0 1-2.031.352 5.989 5.989 0 0 1-2.031-.352c-.483-.174-.711-.703-.59-1.202L5.25 4.971Z" />
                                    </svg>
                                </button>
                            </th>
                            <th scope="col" class="px-6 py-3">CÓDIGO DE REGISTRO</th>
                            <th scope="col" class="px-6 py-3">NOMBRE COMPLETO</th>
                            <th scope="col" class="px-6 py-3">FECHA DEFENSA </th>
                            <th scope="col" class="px-6 py-3">TIPO</th>
                            <th scope="col" class="px-6 py-3">NOTA</th>
                            <th scope="col" class="px-6 py-3">TRIBUNAL</th>
                            <th scope="col" class="px-6 py-3">ACCIÓN</th>
                        </tr>
                    </thead>
                    <tbody id="defensas">
                        @foreach ($defensa as $item)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="w-4 p-4">
                                    @if (!$item['tribunal'])
                                        <div class="flex items-center">
                                            <input id="checkbox-table-search-{{ $loop->index }}"
                                                value="{{ $item['id_defensa'] }}" type="checkbox"
                                                identificador="defensa"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-table-search-{{ $loop->index }}"
                                                class="sr-only">checkbox</label>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item['registro'] }}</td>
                                <td class="px-6 py-4">{{ $item['nombre_completo'] }}</td>
                                <td class="px-6 py-4">{{ $item['fecha'] }}</td>
                                <td class="px-6 py-4">{{ $item['tipo'] }}</td>
                                <td class="px-6 py-4">
                                    @if ($item['nota'] == 0)
                                        <button class="text-black px-4 py-2 transition-all duration-300"
                                            data-modal-target="introducirNota" data-modal-toggle="introducirNota"
                                            onclick="capturarId({{ $item['id_defensa'] }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                                            </svg>
                                            {{-- Introducir nota --}}
                                        </button>
                                    @else
                                        {{ $item['nota'] }}
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if ($item['tribunal'] >= 1)
                                        <button class="text-indigo-600 px-4 py-2 transition-all duration-300"
                                            onclick="verTribunal({{ $item['id_defensa'] }})"
                                            data-modal-target="mostrarTribunal" data-modal-toggle="mostrarTribunal">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                            {{-- Ver jurados asignados --}}
                                        </button>
                                    @else
                                        <button id="botonAsignarJurado"
                                            onclick=" asignarJurado({{ $item['id_defensa'] }})"
                                            class="text-red-800 px-4 py-2 transition-all duration-300"
                                            data-modal-target="agregarTribunal" data-modal-toggle="agregarTribunal">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 3v17.25m0 0c-1.472 0-2.882.265-4.185.75M12 20.25c1.472 0 2.882.265 4.185.75M18.75 4.97A48.416 48.416 0 0 0 12 4.5c-2.291 0-4.545.16-6.75.47m13.5 0c1.01.143 2.01.317 3 .52m-3-.52 2.62 10.726c.122.499-.106 1.028-.589 1.202a5.988 5.988 0 0 1-2.031.352 5.988 5.988 0 0 1-2.031-.352c-.483-.174-.711-.703-.59-1.202L18.75 4.971Zm-16.5.52c.99-.203 1.99-.377 3-.52m0 0 2.62 10.726c.122.499-.106 1.028-.589 1.202a5.989 5.989 0 0 1-2.031.352 5.989 5.989 0 0 1-2.031-.352c-.483-.174-.711-.703-.59-1.202L5.25 4.971Z" />
                                            </svg>
                                            {{-- Asignar jurado --}}
                                        </button>
                                    @endif
                                </td>
                                <td class="flex items-center px-6 py-4">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </main>
    {{-- modal para mostrar los tribunales activos con checkboxes para agregar --}}
    <div id="agregarTribunal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-800">
                <button type="button"
                    class="absolute top-3 end-2.5 text-gray-500 bg-transparent hover:bg-gray-100 hover:text-gray-800 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-700 dark:hover:text-gray-300"
                    data-modal-hide="agregarTribunal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Cerrar</span>
                </button>
                <div class="p-4 md:p-5 text-center space-y-6">
                    <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Agregar Tribunales</h2>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Agregar</th>
                                    <th scope="col" class="px-6 py-3">Nombre Completo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tribunalesActivos as $tribunal)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="px-6 py-4">
                                            <input type="checkbox" identificador="tribunal"
                                                id="checkbox-{{ $tribunal->id_tribunal }}" name="agregarTribunal[]"
                                                value="{{ $tribunal->id_tribunal }}"
                                                class="form-checkbox h-5 w-5 text-blue-600">
                                        </td>
                                        <td class="px-6 py-4 text-gray-900 dark:text-white">
                                            {{ $tribunal->nombre }} {{ $tribunal->apellido }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="flex justify-center">
                        <button data-modal-hide="agregarTribunal" type="button" onclick="enviarAsignacionJurado()"
                            class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-700 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5">
                            Enviar
                        </button>
                        <button data-modal-hide="agregarTribunal" type="button"
                            class="text-gray-800 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- modal para mostrar los datos del tribunal --}}
    <div id="mostrarTribunal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-800">
                <button type="button"
                    class="absolute top-3 end-2.5 text-gray-500 bg-transparent hover:bg-gray-100 hover:text-gray-800 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-700 dark:hover:text-gray-300"
                    data-modal-hide="mostrarTribunal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Cerrar</span>
                </button>
                <div class="p-4 md:p-5 text-center space-y-6">
                    <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Información del Tribunal</h2>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">#</th>
                                    <th scope="col" class="px-6 py-3">Nombre Completo</th>
                                </tr>
                            </thead>
                            <tbody id="tribunalesTableBody">

                            </tbody>
                        </table>
                    </div>
                    <div class="flex justify-center">

                        <button data-modal-hide="mostrarTribunal" type="button"
                            class="text-gray-800 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- modal para introducir la nota del estudiante --}}
    <div x-data="{ open: false }" x-cloak>
        <!-- Botón para abrir el modal (puede ser creado dinámicamente) -->
        {{-- <button @click="open = true" data-modal-target="introducirNota" data-modal-toggle="introducirNota" class="px-4 py-2 bg-blue-500 text-white rounded">
            Abrir Modal
        </button> --}}

        {{-- Modal para introducir la nota del estudiante --}}
        <div x-show="open" x-transition id="introducirNota" tabindex="-1"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-gray-900 bg-opacity-50">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-800">
                    <button type="button" @click="open = false" data-modal-hide="introducirNota"
                        class="absolute top-3 end-2.5 text-gray-500 bg-transparent hover:bg-gray-100 hover:text-gray-800 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-700 dark:hover:text-gray-300">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Cerrar</span>
                    </button>
                    <form action="{{ route('subir.nota') }}" method="POST">
                        @csrf
                        <div class="p-4 md:p-5 text-center space-y-6">
                            <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Introduzca la Nota del
                                estudiante</h2>
                            <input type="text" id="small-input" name="nota"
                                class="block w-full p-3 text-center text-gray-700 border border-gray-300 rounded-lg bg-white text-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">

                            <input type="hidden" value="" name="id" id="id_defensa">
                            <div class="flex justify-center space-x-4">
                                <button @click="open = false" data-modal-hide="introducirNota" type="submit"
                                    class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-700 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5">
                                    Enviar
                                </button>
                                <button @click="open = false" data-modal-hide="introducirNota" type="button"
                                    class="py-2.5 px-5 text-sm font-medium text-gray-800 focus:outline-none bg-gray-200 rounded-lg border border-gray-300 hover:bg-gray-300 hover:text-gray-900 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-600">
                                    Cancelar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




</body>
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"
    integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw=="
    crossorigin="anonymous"></script>
@vite(['node_modules\flowbite\dist\flowbite.min.js'])
@vite(['resources/js/menu.js'])

<script>
    function capturarId(id) {
        document.getElementById('id_defensa').value = id;
    }
    async function verTribunal(id) {
        try {
            const url = `http://sistemasorteodecasos.test/evaluaciones/juradosAsignados/${id}`;


            const response = await fetch(url);

            if (!response.ok) {
                throw new Error('Error en la solicitud, código de estado: ' + response.status);
            }
            const data = await response.json();
            const tribunalesTableBody = document.getElementById('tribunalesTableBody');
            tribunalesTableBody.innerHTML = '';
            for (let i = 0; i < data.tribunaldefensa.length; i++) {
                const tribunal = data.tribunaldefensa[i];
                const row = document.createElement('tr');
                const indice = document.createElement('td');
                const nombreCompletoCell = document.createElement('td');
                nombreCompletoCell.textContent = tribunal.nombre + ' ' + tribunal.apellido;
                indice.textContent = i + 1;
                row.appendChild(indice);
                row.appendChild(nombreCompletoCell);
                tribunalesTableBody.appendChild(row);
            }

        } catch (error) {

            console.error('Error al buscar el caso:', error);
            throw error;
        }
    }

    function asignarJurado(defensasAsignar) {
        const checkboxes = document.querySelectorAll('input[identificador="defensa"]');

        checkboxes.forEach((checkbox) => {
            const defensaId = parseInt(checkbox.value, 10);
            if (!checkbox.disabled && defensasAsignar === defensaId) {
                checkbox.checked = true;
            }
        });
    }
    const urlAsignarJurado = "{{ route('asignar.jurado') }}";

    function enviarAsignacionJurado() {

        const form = document.createElement('form');
        form.method = 'POST';
        form.action = urlAsignarJurado;

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const inputCsrf = document.createElement('input');
        inputCsrf.type = 'hidden';
        inputCsrf.name = '_token';
        inputCsrf.value = csrfToken;
        form.appendChild(inputCsrf);


        const checkboxesDefensa = document.querySelectorAll('input[identificador="defensa"]');
        let algunaSeleccionada = false;


        checkboxesDefensa.forEach((checkbox) => {
            if (!checkbox.disabled && checkbox.checked) {
                algunaSeleccionada = true;


                const inputDefensa = document.createElement('input');
                inputDefensa.type = 'hidden';
                inputDefensa.name = 'defensas[]';
                inputDefensa.value = parseInt(checkbox.value, 10);
                form.appendChild(inputDefensa);
            }
        });


        if (!algunaSeleccionada) {
            const inputDefensaVacio = document.createElement('input');
            inputDefensaVacio.type = 'hidden';
            inputDefensaVacio.name = 'defensas[]';
            inputDefensaVacio.value = '';
            form.appendChild(inputDefensaVacio);
        }


        const checkboxesTribunal = document.querySelectorAll('input[identificador="tribunal"]');
        checkboxesTribunal.forEach((checkbox) => {
            if (!checkbox.disabled && checkbox.checked) {
                const inputTribunal = document.createElement('input');
                inputTribunal.type = 'hidden';
                inputTribunal.name = 'tribunales[]';
                inputTribunal.value = parseInt(checkbox.value, 10);
                form.appendChild(inputTribunal);
            }
        });


        document.body.appendChild(form);
        form.submit();
    }

    function buscarDefensas() {
        const input = document.getElementById('buscarDefensa');
        const filter = input.value.toLowerCase();
        const table = document.getElementById('defensas');
        const rows = table.getElementsByTagName('tr');

        
        const palabrasFiltro = filter.split(' ');

        for (let i = 0; i < rows.length; i++) {
            const cells = rows[i].getElementsByTagName('td');
            let match = false;

           
            for (let j = 0; j < cells.length; j++) {
                const cellText = cells[j].textContent.toLowerCase();

                
                let todasLasPalabrasCoinciden = true;
                for (let palabra of palabrasFiltro) {
                    if (!cellText.includes(palabra)) {
                        todasLasPalabrasCoinciden = false;
                        break;
                    }
                }

                if (todasLasPalabrasCoinciden) {
                    match = true;
                    break;
                }
            }

            rows[i].style.display = match ? '' : 'none';
        }
    }
</script>

</html>
