<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    @vite(['public/css/barra.css'])
    @vite(['public/css/menu.css'])
    @vite(['public/css/styleGestionCasos.css'])
    @vite(['public/css/modal.css'])

    <title>Document</title>
</head>

<body style="overflow: hidden;">

    <x-menulateral>

    </x-menulateral>

    <div class="content" style="background-color: aliceblue;">
        {{-- esto de aqui es la alerta --}}
        @if (session('success'))
            <x-alert type="success" :message="session('success')" />
        @endif

        @if ($errors->any())
            <x-alert type="error" :message="$errors->all()" />
        @endif




        <div class="header">
            <h2>GESTIÓN DE CASOS</h2>
            <div class="add-icon">
                <button id="myBtn"><img src="{{ asset('img/agregar-usuario.png') }}" alt="Agregar Caso"></button>
                <!-- Botón para abrir el modal -->
                <button id="openModalBtn">Abrir Modal</button>

                <!-- Modal -->
                <div id="myModal" class="modal">
                    <form action="{{ route('agregar.caso') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Contenido del Modal -->
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <h2>Nuevo Caso</h2>

                            <!-- Textboxs para nombre y categoría -->

                            <label for="categoria" class="block text-sm font-medium text-gray-700">Categoría</label>
                            <select id="categoria" name="categoria"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                <option value="0">Selecciona una categoría</option>
                                @foreach ($areas as $area)
                                    <option value="{{ $area->id_area }}">{{ $area->nombre_area }}
                                    </option>
                                @endforeach
                            </select>




                            <!-- Área de arrastrar y soltar archivos -->
                            <div class="bg-white rounded mx-auto">
                                <div x-data="dataFileDnD()"
                                    class="relative flex flex-col p-4 text-gray-400 border border-gray-200 rounded">
                                    <div x-ref="dnd"
                                        class="relative flex flex-col text-gray-400 border border-gray-200 border-dashed rounded cursor-pointer p-8 text-center"
                                        @dragover="$refs.dnd.classList.add('border-blue-400', 'ring-4', 'ring-inset')"
                                        @dragleave="$refs.dnd.classList.remove('border-blue-400', 'ring-4', 'ring-inset')"
                                        @drop="$refs.dnd.classList.remove('border-blue-400', 'ring-4', 'ring-inset')"
                                        @drop.prevent="addFiles($event)">
                                        <div class="flex flex-col items-center justify-center py-10">
                                            <svg class="w-8 h-8 mb-4 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 20 16" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p class="text-sm text-gray-500">Arrastra y suelta tus archivos aquí o haz
                                                clic
                                                para seleccionar.</p>
                                        </div>
                                        <!-- Input oculto para seleccionar archivos -->
                                        <input accept=".doc,.docx,.pdf" type="file" name="casoEstudioArchivo[]"
                                            multiple class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                            @change="addFiles($event)" />
                                    </div>

                                    <template x-if="files.length > 0">
                                        <div class="grid grid-cols-2 " @drop.prevent="drop($event)"
                                            @dragover.prevent="$event.dataTransfer.dropEffect = 'move'">
                                            <template x-for="(_, index) in Array.from({ length: files.length })">
                                                <div class="relative flex flex-col items-center overflow-hidden text-center bg-gray-100 border rounded cursor-move select-none"
                                                    style="padding-top: 100%;" @dragstart="dragstart($event)"
                                                    @dragend="fileDragging = null"
                                                    :class="{ 'border-blue-600': fileDragging == index }"
                                                    draggable="true" :data-index="index">
                                                    <button
                                                        class="absolute top-0 right-0 z-50 p-1 bg-white rounded-bl focus:outline-none"
                                                        type="button" @click="remove(index)">
                                                        <svg class="w-4 h-4 text-gray-700"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                    <!-- Icono de tipo de archivo -->
                                                    <template x-if="files[index].type.includes('audio/')">
                                                        <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                                                        </svg>
                                                    </template>
                                                    <template
                                                        x-if="files[index].type.includes('application/') || files[index].type === ''">
                                                        <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                        </svg>
                                                    </template>
                                                    <template x-if="files[index].type.includes('image/')">
                                                        <img class="absolute inset-0 z-0 object-cover w-full h-full border-4 border-white preview"
                                                            x-bind:src="loadFile(files[index])" />
                                                    </template>
                                                    <template x-if="files[index].type.includes('video/')">
                                                        <video
                                                            class="absolute inset-0 object-cover w-full h-full border-4 border-white pointer-events-none preview">
                                                            <fileDragging x-bind:src="loadFile(files[index])"
                                                                type="video/mp4">
                                                        </video>
                                                    </template>

                                                    <div
                                                        class="absolute bottom-0 left-0 right-0 flex flex-col p-2 text-xs bg-white bg-opacity-50">
                                                        <span class="w-full font-bold text-gray-900 truncate"
                                                            x-text="files[index].name">Loading</span>
                                                        <span class="text-xs text-gray-900"
                                                            x-text="humanFileSize(files[index].size)">...</span>
                                                    </div>

                                                    <div class="absolute inset-0 z-40 transition-colors duration-300"
                                                        @dragenter="dragenter($event)"
                                                        @dragleave="fileDropping = null"
                                                        :class="{
                                                            'bg-blue-200 bg-opacity-80': fileDropping == index &&
                                                                fileDragging != index
                                                        }">
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                    </template>
                                </div>
                            </div>

                            <!-- Footer con botones -->
                            <div class="modal-footer">
                                <button class="btn btn-secondary">Cancelar</button>
                                <button class="btn btn-primary">Aceptar</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>


        <table>
            <thead class="bg-[#3F5675]">
                <tr>
                    <th>#</th>
                    <th>Caso</th>
                    <th>Categoria</th>
                    <th>Estado</th>
                    <th>Editar</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($casos as $index => $caso)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $caso->descripcion_caso }}</td>
                        <td>{{ $caso->area ? $caso->area->nombre_area : 'Sin área' }}</td>
                        <td>{{ $caso->estado }}</td>
                        <td>
                            <button type="button" onclick="buscarCasoPorId({{ $caso->id_casoEstudio }})"
                                data-modal-target="editarCaso" data-modal-toggle="editarCaso">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" style="height: 20px"
                                    fill="currentColor" className="size-4">
                                    <path
                                        d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z" />
                                    <path
                                        d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z" />
                                </svg>

                            </button>
                            {{-- |
                            <div x-data="{ showAlerta: false, confirmarAccion: () => {} }">
                                <!-- Componente de mensaje-confirmacion -->
                                <x-mensaje-confirmacion titulo="Advertencia"
                                    contenido="¿Estás seguro de realizar esta acción?"></x-mensaje-confirmacion>

                                <!-- Botón para activar la alerta -->
                                <button type="button"
                                    @click="idCaso = '{{ route('borrar.caso', ['id' => $caso->id_casoEstudio]) }}'; 
                                showAlerta = true; 
                                confirmarAccion = () => {borrarCaso(idCaso); }">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        style="height: 20px" strokeWidth={1.5} stroke="currentColor"
                                        className="size-6">
                                        <path strokeLinecap="round" strokeLinejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </div> --}}

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        <!-- editar modal -->
        <div id="editarCaso" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <form action="">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Editar Caso de Estudio
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="editarCaso">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Cerrar</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4" style="justify-content: center">
                            <label for="first_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre
                                Caso</label>
                            <input type="text" id="first_name" name="nombre_caso"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="**********" required />


                            <label for="categoria" class="block text-sm font-medium text-gray-700">Categoría</label>
                            <select id="categoria" name="categoria"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                <option value="0">Selecciona una categoría</option>
                                @foreach ($areas as $area)
                                    <option value="{{ $area->id_area }}">{{ $area->nombre_area }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="estado"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
                            <select id="estado"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>

                            </select>

                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="file_input">Subir Caso</label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="file_input" type="file" name="nuevo_caso" >


                           



                            <input type="int" value="" hidden name="id_caso">

                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600"
                            style=" flex-direction: row-reverse;">
                            <button data-modal-hide="editarCaso" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancelar</button>
                            <button data-modal-hide="editarCaso" type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Editar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"
    integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw=="
    crossorigin="anonymous"></script>
@vite(['node_modules\flowbite\dist\flowbite.min.js'])
@vite(['resources/js/menu.js'])
@vite(['resources/js/funcionModal.js'])
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script src="https://unpkg.com/create-file-list"></script>
<script>
    function dataFileDnD() {
        return {
            files: [],
            fileDragging: null,
            fileDropping: null,
            humanFileSize(size) {
                const i = Math.floor(Math.log(size) / Math.log(1024));
                return (size / Math.pow(1024, i)).toFixed(2) + " " + ["B", "kB", "MB", "GB", "TB"][i];
            },
            remove(index) {
                let files = [...this.files];
                files.splice(index, 1);
                this.files = createFileList(files);
            },
            drop(e) {
                e.preventDefault(); // Prevenir comportamiento por defecto
                let removed, add;
                let files = [...this.files];

                removed = files.splice(this.fileDragging, 1);
                files.splice(this.fileDropping, 0, ...removed);

                this.files = createFileList(files);

                this.fileDropping = null;
                this.fileDragging = null;
            },
            dragenter(e) {
                e.preventDefault(); // Prevenir comportamiento por defecto
                let targetElem = e.target.closest("[draggable]");
                this.fileDropping = targetElem.getAttribute("data-index");
            },
            dragstart(e) {
                this.fileDragging = e.target.closest("[draggable]").getAttribute("data-index");
                e.dataTransfer.effectAllowed = "move";
                e.preventDefault(); // Prevenir comportamiento por defecto
            },
            loadFile(file) {
                return URL.createObjectURL(file); // Generar una URL para previsualización
            },
            addFiles(e) {
                const fileList = Array.from(e.target.files);
                this.files = createFileList([...this.files, ...fileList]);
            },
        };
    }

    function createFileList(files) {
        const dataTransfer = new DataTransfer();
        files.forEach(file => dataTransfer.items.add(file));
        return dataTransfer.files;
    }




    function borrarCaso(url) {
        // Crear un formulario dinámico
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = url;

        // Agregar el token CSRF
        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        form.appendChild(csrfInput);

        // Agregar el método DELETE
        const methodInput = document.createElement('input');
        methodInput.type = 'hidden';
        methodInput.name = '_method';
        methodInput.value = 'DELETE';
        form.appendChild(methodInput);

        // Agregar el formulario al DOM y enviarlo
        document.body.appendChild(form);
        form.submit();
    }

    async function buscarCasoPorId(id) {
        try {
            const url = `http://sistemasorteodecasos.test/gestion-de-casos/buscarCaso/${id}`;


            const response = await fetch(url);

            if (!response.ok) {
                throw new Error('Error en la solicitud, código de estado: ' + response.status);
            }
            const data = await response.json();
            document.getElementById('first_name').value = data.descripcion_caso;
            document.getElementById('categoria').value = data.id_area.toString();
            document.getElementById('estado').value = data.estado;

        } catch (error) {
            // Maneja cualquier error que ocurra durante la solicitud
            console.error('Error al buscar el caso:', error);
            throw error;
        }
    }
</script>



</html>
