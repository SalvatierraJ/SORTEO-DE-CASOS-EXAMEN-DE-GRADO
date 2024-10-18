<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-5yYP6DFN3ApXqkaPnFMvEqvMZ8rDvj6N23vtsMT5Rj2T4P8/hcfglzFIAXsMWg6L" crossorigin="anonymous">

    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;900&display=swap" rel="stylesheet">
    <!-- Carga primero el menú CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/menu.css') }}">
    <!-- Luego carga el CSS de gestión de estudiantes -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/gestionestudiantes.css') }}">
    <title>Gestion de estudiantes</title>
</head>

<body>
    <div class="contenedor-padre">
        <x-menulateral>
        </x-menulateral>

        <section class="contenido-estudiantes">
            <div class="posicion">
                <div class="Elecciones">
                    <div class="Elecciones-div">
                        <p> Filtro </p>
                        <select name="carreras" id="carreras">
                            <option value="Sistemas">sistemas</option>
                            <option value="Redes">redes</option>
                            <option value="Derecho">Derecho</option>
                            <option value="Psicologia">Psicologia</option>
                        </select>
                        <select name="estado" id="estado">
                            <option value="Espera">Espera</option>
                            <option value="Defendido">Defendido</option>
                            <option value="Asignado">Asignado</option>
                        </select>
                        <a href="#">
                            <img src={{ asset('img/impresora.png') }} class="impresora">
                        </a>
                    </div>
                </div>
                <div class="agregar">
                    <div class="div-agregar">
                        <img src="{{ asset('img/agregar_usuario.jpg') }}" class="image-agregar">
                    </div>
                    <div class="Gestion-h3">

                        <h3 class="gestion-h3">Gestión de Estudiantes</h3>

                    </div>
                </div>
                <table>
                    <tr class="tr-cabezera">
                        <th class="th-tr-cabezera">#</th>
                        <th class="th-tr-cabezera">CODIGO DE REGISTRO</th>
                        <th class="th-tr-cabezera">NOMBRE COMPLETO</th>
                        <th class="th-tr-cabezera">CELULAR</th>
                        <th class="th-tr-cabezera">FACULTAD</th>
                        <th class="th-tr-cabezera">CARRERA</th>
                        <th class="th-tr-cabezera">ESTADO</th>
                        <th class="th-tr-cabezera">EDITAR</th>
                    </tr>
                    <tr>
                        <th>1</th>
                        <th>737908</th>
                        <th>PABLO BENJAMIN HEREDIA RUIZ</th>
                        <th>69287283</th>
                        <th>CIENCIAS Y TECNOLOGIA</th>
                        <th>ING SISTEMAS</th>
                        <th> <svg width="11" height="11">
                                <circle cx="5" cy="5" r="5" fill="green" />
                            </svg> ASIGNADO</th>
                        <th><img class="editar-imagen" src="https://img.icons8.com/officel/80/create-new.png"
                                alt="create-new" /></th>
                    </tr>
                    <tr>
                        <th>1</th>
                        <th>737908</th>
                        <th>CARLOS FABRICIO </th>
                        <th>6928728</th>
                        <th>CIENCIAS Y TECNOLOGIA</th>
                        <th>ING ELECTRONICA</th>
                        <th> <svg width="11" height="11">
                                <circle cx="5" cy="5" r="5" fill="yellow    " />
                            </svg> EN ESPERA</th>
                        <th><img class="editar-imagen" src="https://img.icons8.com/officel/80/create-new.png"
                                alt="create-new" /></th>
                    </tr>
                    <tr>
                        <th>1</th>
                        <th>737908</th>
                        <th>ALEJANDRO FABRICIO </th>
                        <th>6928728</th>
                        <th>CIENCIAS Y TECNOLOGIA</th>
                        <th>ING ELECTRONICA</th>
                        <th> <svg width="11" height="11">
                                <circle cx="5" cy="5" r="5" fill="red" />
                            </svg> Defendido</th>
                        <th><img class="editar-imagen" src="https://img.icons8.com/officel/80/create-new.png"
                                alt="create-new" /></th>
                    </tr>
                </table>
            </div>
        </section>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"
        integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw=="
        crossorigin="anonymous"></script>
    @vite(['resources/js/menu.js'])
    <div class="window-notice nuevo-estudiante" id="window-notice">

        <div class="content">
            <h3 class="barra-nuevo-estudiante">Nuevo estudiante</h3>
            <div class="content-text">
                <form class="anadir-nuevo-estudiante">

                    <label for="registro" class="label-agregar-estudiantes"> Registro </label> <input type="text"
                        name="registro">
                    <label for="Nombre" class="label-agregar-estudiantes"> Nombre </label> <input type="text"
                        name="Nombre">
                    <label for="Apellido" class="label-agregar-estudiantes"> Apellido </label> <input type="text"
                        name="Apellido">
                    <label for="Carrera" class="label-agregar-estudiantes"> Carrera </label> <input type="text"
                        name="Carrera">
                    <label for="Telefono" class="label-agregar-estudiantes"> Telefono </label> <input type="text"
                        name="Telefono">
                    <label for="Correo" class="label-agregar-estudiantes"> Correo </label> <input type="text"
                        name="Correo">

                    <div class="contenedor-botones">
                        <button class="botones-agregar-estudiantes cancelar"> Cancelar</button>
                        <input type="submit" value="Enviar" class="botones-agregar-estudiantes enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src={{ asset('js/menu.js') }}></script>
</body>


</html>
