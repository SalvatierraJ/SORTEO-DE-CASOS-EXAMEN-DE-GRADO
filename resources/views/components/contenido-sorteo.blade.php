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
                <div class="sorteo-categoria">
                    <h3>
                        <span class="flecha"></span> Desarrollo de Software (6)
                    </h3>

                    <ul class="sorteo-temas" style="display: none;">
                        <li>
                            Implementación de un sistema de detección de intrusos en redes corporativas.
                            <span class="icono-ojito">👁️</span>
                        </li>
                        <li>
                            Aplicación de técnicas de IA para casos de cibercrimen.
                            <span class="icono-ojito">👁️</span>
                        </li>
                    </ul>
                </div>
                <div class="sorteo-categoria">
                    <h3>
                        <span class="flecha"></span> Big Data y Analítica de Datos (10)
                    </h3>
                    <ul class="sorteo-temas" style="display: none;">
                        <li>
                            Optimización de procesamiento de datos masivos en entornos distribuidos.
                            <span class="icono-ojito">👁️</span>
                        </li>
                        <li>
                            Desarrollo de modelos predictivos para riesgos financieros.
                            <span class="icono-ojito">👁️</span>
                        </li>
                        <li>
                            Análisis predictivo en el sector salud usando datos masivos.
                            <span class="icono-ojito">👁️</span>
                        </li>
                        <li>
                            Aplicación de machine learning para la minería de datos.
                            <span class="icono-ojito">👁️</span>
                        </li>
                        <li>
                            Visualización en tiempo real de datos masivos.
                            <span class="icono-ojito">👁️</span>
                        </li>
                        <li>
                            Procesamiento eficiente de grandes volúmenes de datos en Hadoop.
                            <span class="icono-ojito">👁️</span>
                        </li>
                        <li>
                            Predicción de tendencias en redes sociales mediante datos masivos.
                            <span class="icono-ojito">👁️</span>
                        </li>
                        <li>
                            Arquitectura de procesamiento de datos para IoT.
                            <span class="icono-ojito">👁️</span>
                        </li>
                        <li>
                            Modelo predictivo para la detección temprana de fraudes en transacciones bancarias.
                            <span class="icono-ojito">👁️</span>
                        </li>
                        <li>
                            Implementación de algoritmos de clustering para la segmentación de clientes en e-commerce.
                            <span class="icono-ojito">👁️</span>
                        </li>
                    </ul>
                </div>
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
                        <button type="button" class="boton-cancelar" id="boton-cancelar">Notificar</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
</div>
</div>
