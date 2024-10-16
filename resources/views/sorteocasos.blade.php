<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteo de Casos</title>
    <link rel="stylesheet" href="{{ asset('css/sorteo_styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <!-- Añadimos Bootstrap desde CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Estilo para la tabla superior de búsqueda */
        .search-container {
            background-color: #e9ecef; /* Color gris suave */
            border: 2px solid rgba(0, 0, 0, 0.1); /* Bordes suaves */
            border-radius: 10px; /* Bordes redondeados */
            padding: 10px; /* Espaciado interno */
            margin-bottom: 20px; /* Margen inferior */
        }
    </style>
</head>
<body>

<!--
<x-menulateral>

</x-menulateral>
-->

    <div class="container">
        <h1>Sorteo de Casos</h1>

        <div class="row">
            <!-- Columna izquierda: Lista de estudiantes -->
            <div class="col-md-6">
                <div class="search-container mb-3">
                    <div class="search-bar input-group">
                        <input type="text" class="form-control" placeholder="Buscar estudiantes">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                Ir <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <table class="table table-bordered table-rounded">
                    <thead>
                        <tr>
                            <th>Registro</th>
                            <th>Nombre Completo</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Ejemplo de filas con los datos de los estudiantes -->
                        <tr>
                            <td>819234</td>
                            <td>Lucas Olmedo Pache</td>
                            <td><div class="status-indicator"></div> En espera</td>
                            <td><button class="btn btn-primary" disabled>Sortear</button></td>
                        </tr>
                        <tr>
                            <td>819235</td>
                            <td>Lucía Martínez Pérez</td>
                            <td><div class="status-indicator"></div> En espera</td>
                            <td><button class="btn btn-primary" disabled>Sortear</button></td>
                        </tr>
                        <tr>
                            <td>819234</td>
                            <td>Lucas Olmedo Pache</td>
                            <td><div class="status-indicator"></div> En espera</td>
                            <td><button class="btn btn-primary" disabled>Sortear</button></td>
                        </tr>
                        <tr>
                            <td>819235</td>
                            <td>Lucía Martínez Pérez</td>
                            <td><div class="status-indicator"></div> En espera</td>
                            <td><button class="btn btn-primary" disabled>Sortear</button></td>
                        </tr>
                        <tr>
                            <td>819234</td>
                            <td>Lucas Olmedo Pache</td>
                            <td><div class="status-indicator"></div> En espera</td>
                            <td><button class="btn btn-primary" disabled>Sortear</button></td>
                        </tr>
                        <tr>
                            <td>819235</td>
                            <td>Lucía Martínez Pérez</td>
                            <td><div class="status-indicator"></div> En espera</td>
                            <td><button class="btn btn-primary" disabled>Sortear</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Columna derecha: Lista de casos -->
            <div class="col-md-6">
                <div class="search-container mb-3">
                    <div class="search-bar input-group">
                        <input type="text" class="form-control" placeholder="Filtrar los temas">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                Ir <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>



                <!--  zona del acordeon  que debe expandirse o contraerse -->

                <!-- Zona del acordeón que debe expandirse o contraerse -->
                
                <h4>Casos por Categoría</h4>
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center toggle" onclick="toggleAccordion(this)">
                        <strong>Desarrollo de Software (2)</strong>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <ul class="list-group mt-2 content">
                        <li class="list-group-item">Planificación de software y análisis de requisitos</li>
                        <li class="list-group-item">Desarrollo de aplicaciones móviles</li>
                    </ul>
                </li>
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center toggle" onclick="toggleAccordion(this)">
                        <strong>Seguridad Informática (2)</strong>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <ul class="list-group mt-2 content">
                        <li class="list-group-item">Implementación de políticas de protección de datos</li>
                        <li class="list-group-item">Desarrollo de sistemas de seguridad para redes</li>
                    </ul>
                </li>
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center toggle" onclick="toggleAccordion(this)">
                        <strong>Big Data y Analítica de Datos (10)</strong>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <ul class="list-group mt-2 content">
                        <li class="list-group-item">Optimización de procesamiento de datos masivos en entornos distribuidos.</li>
                        <li class="list-group-item">Análisis predictivo en el sector salud usando datos masivos.</li>
                        <li class="list-group-item">Aplicación de machine learning para la minería de datos.</li>
                        <li class="list-group-item">Visualización en tiempo real de datos masivos.</li>
                        <li class="list-group-item">Desarrollo de modelos predictivos para datos no estructurados.</li>
                        <li class="list-group-item">Procesamiento eficiente de grandes volúmenes de datos en Hadoop.</li>
                        <li class="list-group-item">Predicción de tendencias en redes sociales mediante datos masivos.</li>
                        <li class="list-group-item">Arquitectura de procesamiento de datos para IoT.</li>
                        <li class="list-group-item">Modelo predictivo para la detección temprana de fraudes en transacciones bancarias.</li>
                        <li class="list-group-item">Implementación de algoritmos de clustering para la segmentación de clientes en e-commerce.</li>
                    </ul>
                </li>
            </ul>


                <!-- Fin de la zona del acordeón -->

                <script>
                    function toggleAccordion(element) {
                    const parentItem = element.parentElement;
                    const content = element.nextElementSibling;
                    const icon = element.querySelector('i');
                    
                    if (parentItem.classList.contains('active')) {
                        parentItem.classList.remove('active');
                        content.style.display = "none";
                        icon.classList.replace("fa-chevron-up", "fa-chevron-down");
                    } else {
                        parentItem.classList.add('active');
                        content.style.display = "block";
                        icon.classList.replace("fa-chevron-down", "fa-chevron-up");
                    }
                }


                    // Inicializa todos los contenidos como ocultos al cargar la página
                    document.querySelectorAll('.content').forEach(content => {
                        content.style.display = 'none';
                    });
                </script>



                <!--  fin de la zona del acordeon -->


            </div>
        </div>
    </div>

    <!-- Vinculamos Bootstrap JS desde CDN (no funcional en este caso, solo estructura) -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- Font Awesome para los íconos -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
