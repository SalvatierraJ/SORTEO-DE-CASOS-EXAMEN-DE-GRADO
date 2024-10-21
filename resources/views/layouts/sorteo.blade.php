<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteo de Casos</title>
    <link rel="stylesheet" href="{{ asset('css/sorteo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sorteo_modal.css') }}">
    
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    
</head>
<body>
    
<x-menulateral>
    
</x-menulateral>

    <div class="wrapper">
        <h1 id="sorteo-titulo">SORTEO DE CASOS</h1>

        <div id="sorteo-contenedor">
            <div id="sorteo-izquierda">
                <h2 id="sorteo-titulo-estudiantes">ESTUDIANTES</h2>

                <table id="sorteo-buscador-table">
                    <tr>
                        <td>
                            <div id="sorteo-buscador-bot">
                                <input type="text" id="txt_buscar" placeholder="Buscar estudiantes">
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
                                <input type="text" id="txt_buscar" placeholder="Filtrar temas">
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

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"
    integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw=="
    crossorigin="anonymous">
</script>
@vite(['resources/js/menu.js'])
<script>
    document.querySelectorAll('.sorteo-categoria h3').forEach((h3) => {
        h3.addEventListener('click', () => {
            const temas = h3.nextElementSibling;
            if (temas.style.display === 'none' || temas.style.display === '') {
                temas.style.display = 'block'; // Mostrar los temas
                h3.textContent = '▼ ' + h3.textContent.slice(2); // Cambiar flecha hacia abajo
            } else {
                temas.style.display = 'none'; // Ocultar los temas
                h3.textContent = '▶ ' + h3.textContent.slice(2); // Cambiar flecha hacia la derecha
            }
        });
    });

    // Inicializar las flechas hacia la derecha al cargar la página
    document.querySelectorAll('.sorteo-categoria h3').forEach((h3) => {
        h3.textContent = '▶ ' + h3.textContent.slice(1);
    });

    // Script para el modal
    const modal = document.getElementById("miModal");
    const cerrarModal = document.getElementById("cerrar-modal");

    // Mostrar el modal al hacer clic en cualquier botón "Sortear"
    document.querySelectorAll('.sortear-button').forEach((button) => {
        button.onclick = function() {
            modal.style.display = "block";
        }
    });

    // Cerrar el modal al hacer clic en la "X"
    cerrarModal.onclick = function() {
        modal.style.display = "none";
    }

    // Cerrar el modal al hacer clic fuera del contenido del modal
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

// Cerrar el modal al hacer clic en el botón "Cancelar"
const botonCancelar = document.getElementById("boton-cancelar");
botonCancelar.onclick = function() {
    modal.style.display = "none";
}


// Script para manejar el cierre del modal con la tecla ESC
window.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') { // Si la tecla presionada es ESC
        modal.style.display = "none";
    }
});

// Script para manejar el clic en el botón "Guardar" con la tecla Enter
window.addEventListener('keydown', function(event) {
    if (event.key === 'Enter') { // Si la tecla presionada es Enter
        const isModalVisible = modal.style.display === "block";
        if (isModalVisible) {
            document.querySelector(".boton-guardar").click(); // Simula un clic en el botón "Guardar"
        }
    }
});

</script>




</html>
