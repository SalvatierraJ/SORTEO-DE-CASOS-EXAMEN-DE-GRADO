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
                    <tbody>
                        <tr>
                            <td>610014</td>
                            <td>Lucas Gómez Rocha</td>
                            <td><button class="sortear-button">Sortear</button></td>
                        </tr>
                        <tr>
                            <td>610014</td>
                            <td>Hans Mendoza Salazar</td>
                            <td><button class="sortear-button">Sortear</button></td>
                        </tr>
                        <tr>
                            <td>610014</td>
                            <td>Enrrique Segoviano</td>
                            <td><button class="sortear-button">Sortear</button></td>
                        </tr>
                        <tr>
                            <td>610014</td>
                            <td>Juan Asimov Choque</td>
                            <td><button class="sortear-button">Sortear</button></td>
                        </tr>
                        <tr>
                            <td>610014</td>
                            <td>Lucia Prado Pardo</td>
                            <td><button class="sortear-button">Sortear</button></td>
                        </tr>
                        <tr>
                            <td>610014</td>
                            <td>Juan Josias Jimenez</td>
                            <td><button class="sortear-button">Sortear</button></td>
                        </tr>
                        <tr>
                            <td>610014</td>
                            <td>Graciela Jimenez Justiniano</td>
                            <td><button class="sortear-button">Sortear</button></td>
                        </tr>
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

            <!-- Modal -->
            <div id="miModal" class="modal">
                <div class="modal-content">
                    <span class="close" id="cerrar-modal">&times;</span>
                    <h3 class="titulo-seccion">Información del Estudiante</h3>
                    <form id="formulario-modal">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" required disabled>
                        </div>
                        <div class="form-group">
                            <label for="carrera">Carrera:</label>
                            <input type="text" id="carrera" name="carrera" required disabled>
                        </div>
                        <div class="form-group">
                            <label for="categoria">Categoría:</label>
                            <input type="text" id="categoria" name="categoria" required disabled>
                        </div>
                        <div class="form-group">
                            <label for="caso">Caso:</label>
                            <input type="text" id="caso" name="caso" required disabled>
                        </div>
                        <div class="form-group">
                            <label for="fecha-defensa">Fecha de Defensa:</label>
                            <input type="text" id="fecha-defensa" name="fecha-defensa" required disabled>
                        </div>
                        <div class="modal-botones">
                            <div>
                                <button type="submit" class="boton-guardar">Guardar</button>
                                <button type="button" class="boton-cancelar" id="boton-cancelar">Cancelar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
