<div class="wrapper">
    <h1 id="sorteo-titulo">SORTEO DE CASOS</h1>

    <div id="sorteo-contenedor">
        <div id="sorteo-izquierda">
            <h2 id="sorteo-titulo-estudiantes">ESTUDIANTES</h2>

            <table id="sorteo-buscador-table">
                <tr>
                    <td>
                        <div id="sorteo-buscador-bot">
                            <input type="text" id="buscar_estudiante" placeholder="Buscar estudiantes">
                            <button id="sorteo-buscador-boton">➜</button>
                        </div>
                    </td>
                </tr>
            </table>

            <div id="sorteo-tabla-estudiantes">

                <table>
                    <thead>
                        <tr>
                            <th>Registro</th>
                            <th>Nombre Completo</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody id="estudiantes">
                        {{ $estudiantes }}

                    </tbody>
                </table>
            </div>
        </div>

        <div id="sorteo-derecha">
            <h2 id="sorteo-titulo-temas">TEMAS POR CATEGORÍAS</h2>

            <table id="sorteo-buscador-table">
                <tr>
                    <td>
                        <div id="sorteo-buscador-bot">
                            <input type="text" id="buscar_categoria" placeholder="Filtrar temas">
                            <button id="sorteo-buscador-boton">➜</button>
                        </div>
                    </td>
                </tr>
            </table>

            <div id="sorteo-tabla-temas">
                {{ $casos }}
            </div>

        </div>
        {{-- Modal de carga --}}
        <div id="loadingModal" class="fixed top-0 left-0 z-50 w-screen h-screen flex items-center justify-center hidden"
            style="background: rgba(0, 0, 0, 0.3);">
            <div class="bg-white border py-2 px-5 rounded-lg flex items-center flex-col">
                <div class="loader-dots block relative w-20 h-5 mt-2">
                    <div class="absolute top-0 mt-1 w-3 h-3 rounded-full bg-red-500"></div>
                    <div class="absolute top-0 mt-1 w-3 h-3 rounded-full bg-orange-500"></div>
                    <div class="absolute top-0 mt-1 w-3 h-3 rounded-full bg-red-500"></div>
                    <div class="absolute top-0 mt-1 w-3 h-3 rounded-full bg-orange-500"></div>
                </div>
                <div id="mensajeSorteo" class="text-gray-500 text-xs font-medium mt-2 text-center">
                    SORTEANDO CASO
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div id="miModal" class="modal">
            <div class="modal-content">
                <span class="close" id="cerrar-modal">&times;</span>
                <h3 class="titulo-seccion">Información de la Defensa</h3>
                <form id="formulario-modal">
                    <div class="form-group">
                        <label for="nombre-estudiante">Nombre del Estudiante:</label>
                        <input type="text" id="nombre-estudiante" name="nombre-estudiante" disabled>
                    </div>
                    <div class="form-group">
                        <label for="tipo-defensa">Tipo de Defensa:</label>
                        <input type="text" id="tipo-defensa" name="tipo-defensa" disabled>
                    </div>
                    <div class="form-group">
                        <label for="fecha-defensa">Fecha de Defensa:</label>
                        <input type="text" id="fecha-defensa" name="fecha-defensa" disabled>
                    </div>
                    <div class="form-group">
                        <label for="area-asignada">Área Asignada:</label>
                        <input type="text" id="area-asignada" name="area-asignada" disabled>
                    </div>
                    <div class="form-group">
                        <label for="caso-asignado">Caso Asignado:</label>
                        <input type="text" id="caso-asignado" name="caso-asignado" disabled>
                    </div>
                    <input type="int" value="" hidden id="id_estudiante">
                    <input type="int" value="" hidden id="id_defensa">
                    <div class="modal-botones">
                        <button type="button" class="boton-cancelar" id="boton-notificar">Notificar</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
</div>
</div>
