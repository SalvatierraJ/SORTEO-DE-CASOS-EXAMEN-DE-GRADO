<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    @vite(['public/css/menu.css'])
    @vite(['public/css/styleGestionCasos.css'])
    @vite(['public/css/modal.css'])
    <title>Document</title>
</head>

<body>
    <x-menulateral>

    </x-menulateral>

    <div class="content">
        <div class="header">
            <h2>GESTIÓN DE CASOS</h2>
            <div class="add-icon">
                <button id="myBtn"><img src="{{ asset('img/agregar-usuario.png') }}" alt="Agregar Caso"></button>
                <!-- Botón para abrir el modal -->
                <button id="openModalBtn">Abrir Modal</button>

                <!-- Modal -->
                <div id="myModal" class="modal">

                    <!-- Contenido del Modal -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h2>Nuevo Caso</h2>

                        <!-- Textboxs para nombre y categoría -->
                        <input type="text" placeholder="Nombre" id="nombre">
                        <input type="text" placeholder="Categoría" id="categoria">



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
                                        <p class="text-sm text-gray-500">Arrastra y suelta tus archivos aquí o haz clic
                                            para seleccionar.</p>
                                    </div>
                                    <!-- Input oculto para seleccionar archivos -->
                                    <input accept="*" type="file" multiple
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                        @change="addFiles($event)" />
                                </div>

                                <template x-if="files.length > 0">
                                    <div class="grid grid-cols-2 " @drop.prevent="drop($event)"
                                        @dragover.prevent="$event.dataTransfer.dropEffect = 'move'">
                                        <template x-for="(_, index) in Array.from({ length: files.length })">
                                            <div class="relative flex flex-col items-center overflow-hidden text-center bg-gray-100 border rounded cursor-move select-none"
                                                style="padding-top: 100%;" @dragstart="dragstart($event)"
                                                @dragend="fileDragging = null"
                                                :class="{ 'border-blue-600': fileDragging == index }" draggable="true"
                                                :data-index="index">
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
                                                    @dragenter="dragenter($event)" @dragleave="fileDropping = null"
                                                    :class="{ 'bg-blue-200 bg-opacity-80': fileDropping == index &&
                                                            fileDragging != index }">
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

                </div>
            </div>
        </div>


        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Caso</th>
                    <th>Categoria</th>
                    <th>Editar</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Desarrollo de una Aplicación Web para la Gestión de Inventarios en PYMEs</td>
                    <td>Tecnología de la Información</td>
                    <td>Boton Editar / Borrar</td>
                    <td><a href="#"><i class="edit-icon"></i></a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Desarrollo de una Aplicación Web para la Gestión de Inventarios en PYMEs</td>
                    <td>Tecnología de la Información</td>
                    <td>Boton Editar / Borrar</td>
                    <td><a href="#"><i class="edit-icon"></i></a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Desarrollo de una Aplicación Web para la Gestión de Inventarios en PYMEs</td>
                    <td>Tecnología de la Información</td>
                    <td>Boton Editar / Borrar</td>
                    <td><a href="#"><i class="edit-icon"></i></a></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Desarrollo de una Aplicación Web para la Gestión de Inventarios en PYMEs</td>
                    <td>Tecnología de la Información</td>
                    <td>Boton Editar / Borrar</td>
                    <td><a href="#"><i class="edit-icon"></i></a></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Desarrollo de una Aplicación Web para la Gestión de Inventarios en PYMEs</td>
                    <td>Tecnología de la Información</td>
                    <td>Boton Editar / Borrar</td>
                    <td><a href="#"><i class="edit-icon"></i></a></td>
                </tr>
            </tbody>
        </table>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"
    integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw=="
    crossorigin="anonymous"></script>
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
                return (
                    (size / Math.pow(1024, i)).toFixed(2) * 1 +
                    " " + ["B", "kB", "MB", "GB", "TB"][i]
                );
            },
            remove(index) {
                let files = [...this.files];
                files.splice(index, 1);
                this.files = createFileList(files);
            },
            drop(e) {
                let removed, add;
                let files = [...this.files];

                removed = files.splice(this.fileDragging, 1);
                files.splice(this.fileDropping, 0, ...removed);

                this.files = createFileList(files);

                this.fileDropping = null;
                this.fileDragging = null;
            },
            dragenter(e) {
                let targetElem = e.target.closest("[draggable]");
                this.fileDropping = targetElem.getAttribute("data-index");
            },
            dragstart(e) {
                this.fileDragging = e.target.closest("[draggable]").getAttribute("data-index");
                e.dataTransfer.effectAllowed = "move";
            },
            loadFile(file) {
                const preview = document.querySelectorAll(".preview");
                const previewImage = preview[0];
                if (previewImage) return URL.createObjectURL(file);
                return URL.createObjectURL(file);
            },
            addFiles(e) {
                const fileList = Array.from(e.target.files);
                this.files.push(...fileList);
            }
        };
    }
</script>

@vite(['resources/js/menu.js'])
@vite(['resources/js/funcionModal.js'])

</html>
