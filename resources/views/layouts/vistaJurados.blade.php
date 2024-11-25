<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    @vite(['public/css/menu.css'])
    @vite(['public/css/vistaJurado.css'])
    @vite(['public/css/funcionmodal.css'])
    @vite(['public/css/busqueda.css'])

    <title>Gestion Jurado</title>
</head>

<body style="overflow: hidden;">
    <x-menulateral></x-menulateral>

    <div class="content">
        {{-- esto de aqui es la alerta --}}
        @if (session('success'))
            <x-alert type="success" :message="session('success')" />
        @endif

        @if ($errors->any())
            <x-alert type="error" :message="$errors->all()" />
        @endif
        <div class="header">
            <div class="header-content">
                <h2>GESTIÓN DE JURADOS</h2>
                <div class="search-container">
                    <input type="text" id="searchBar" placeholder="Buscar jurado...">
                    <button type="button" class="bg-[#3F5675]" id="searchButton">Ir <span>&#8594;</span></button>
                </div>
                <div class="add-icon">
                    <button id="addBtn">
                        <img src="{{ asset('img/agregar-usuario.png') }}" alt="Agregar Jurado">
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal para agregar o editar jurado -->
        <div id="addModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <label id="modalTitle" class="nuevoJurado">Nuevo Jurado</label>
                    <span class="close">&times;</span>
                </div>
                <form id="juradoForm" method="POST" action="{{route('guardarJurado')}}" class="modal-body">
                    @csrf
                    <!-- Campos del formulario -->
                    <div class="form-group">
                        <label for="registro">Registro:</label>
                        <input type="text" id="registro" name="registro" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido:</label>
                        <input type="text" id="apellido" name="apellido" required>
                    </div>
                    {{-- <div class="form-group">
                        <label for="titulo">Título:</label>
                        <select id="titulo" name="titulo" required>
                            <option value="" disabled selected>Seleccione</option>
                            <option value="Licenciado">Licenciado</option>
                            <option value="Ingeniero">Ingeniero</option>
                            <option value="Doctor">Doctor</option>
                        </select>
                    </div> --}}
                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        <input type="tel" id="telefono" name="telefono">
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo:</label>
                        <input type="email" id="correo" name="correo" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="cancelBtn" class="btn btn-secondary">Cancelar</button>
                        <button type="submit" id="saveBtn" class="btn btn-primary">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- Modal Editar --}}
        <div id="editModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <label id="modalTitle" class="editarJurado">Editar Jurado</label>
                    <span class="close">&times;</span>
                </div>
                <form id="editJuradoForm" action="{{route('editar.Tribunal')}}" method="POST" class="modal-body">
                    @csrf
                    <!-- Campos del formulario -->
                    <div class="form-group">
                        <label for="editRegistro">Registro:</label>
                        <input type="text" id="editRegistro" name="registro" required>
                    </div>
                    <div class="form-group">
                        <label for="editNombre">Nombre:</label>
                        <input type="text" id="editNombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="editApellido">Apellido:</label>
                        <input type="text" id="editApellido" name="apellido" required>
                    </div>
                    <div class="form-group">
                        <label for="editTelefono">Teléfono:</label>
                        <input type="int" id="editTelefono" name="telefono"  required>
                    </div>
                    <div class="form-group">
                        <label for="editCorreo">Correo:</label>
                        <input type="email" id="editCorreo" name="correo" required>
                    </div>
                    <input type="int" hidden value="" id="id_tribunal" name="id_tribunal">
                    <div class="form-group">
                        <label for="editEstado">Estado:</label>
                        <select id="editEstado" name="estado" required>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="editCancelBtn" class="btn btn-secondary">Cancelar</button>
                        <button type="submit" id="editSaveBtn" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>

        <table>
            <thead class="bg-[#3F5675]">
                <tr>
                    <th>#</th>
                    <th>Estado</th>
                    <th>Nombre Completo</th>
                    <th>Celular</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tribunales as $index => $tribunal)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $tribunal->estado }}</td>
                    <td>{{ $tribunal->nombre }} {{ $tribunal->apellido }}</td>
                    <td>{{ $tribunal->telefono }}</td>
                    <td>
                        
                        <button type="button" class="edit-button" data-url="{{ route('buscar.Tribunal', ['id' => $tribunal->id_tribunal]) }}">
                            <img src="{{ asset('img/editar.png') }}" alt="Editar" class="edit-icon">
                        </button>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"
        integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw=="
        crossorigin="anonymous"></script>
    @vite(['resources/js/menu.js'])
    @vite(['resources/js/modalfuncion.js'])
</body>
<script>

</script>

</html>
