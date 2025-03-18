<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sorteo de Casos</title>
    @vite(['public/css/barra.css'])
    @vite(['public/css/menu.css'])
    @vite(['public/css/sorteo.css'])
    @vite(['public/css/sorteo_modal.css'])
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body style="display: flex;overflow: hidden; background-color: aliceblue;">

    <x-menulateral>

    </x-menulateral>

    @if (session('success'))
        <x-alert type="success" :message="session('success')" />
    @endif

    @if ($errors->any())
        <x-alert type="error" :message="$errors->all()" />
    @endif
    <x-contenido-sorteo>
        <x-slot name='estudiantes'>
            @foreach ($estudiantes as $estudiante)
                <tr>
                    <td>{{ $estudiante['registro'] }}</td>
                    <td>{{ $estudiante['nombre_completo'] }}</td>

                    @if ($estudiante['estado_defensa_interna'] == 'Pendiente')
                        <td>
                            <button onclick="enviarsorteo('Defensa interna', {{ $estudiante['id_estudiante'] }})"
                                class="sortear-button">Sortear</button>
                        </td>
                    @else
                        <td>
                            <button onclick="enviarsorteo('Defensa externa', {{ $estudiante['id_estudiante'] }})"
                                class="sortear-button">Sortear</button>
                        </td>
                    @endif
                </tr>
            @endforeach

        </x-slot>
        <x-slot name='casos'>

            @foreach ($casosPorArea as $area => $casos)
                <div class="sorteo-categoria">
                    <h3>
                        <span class="flecha"></span> {{ $area }} ({{ $casos->count() }})
                    </h3>

                    <ul class="sorteo-temas" style="display: none;">
                        @foreach ($casos as $caso)
                            <li>
                                {{ $caso->descripcion_caso }}
                                <span class="icono-ojito"
                                    onclick="cambiarEstadoCaso({{ $caso->id_casoEstudio }}, '{{ $caso->estado }}');">
                                    @if ($caso->estado === 'Activo')
                                        👁️ <!-- Ícono de ojo abierto -->
                                    @else
                                        👁️‍🗨️ <!-- Ícono de ojo cerrado -->
                                    @endif
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach


        </x-slot>

    </x-contenido-sorteo>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"
    integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw=="
    crossorigin="anonymous"></script>
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
    // document.querySelectorAll('.sortear-button').forEach((button) => {
    //     button.onclick = function() {
    //         modal.style.display = "block";
    //     }
    // });

    // Cerrar el modal al hacer clic en la "X"
    cerrarModal.onclick = function() {
        modal.style.display = "none";
    }

    // Cerrar el modal al hacer clic fuera del contenido del modal


    // Cerrar el modal al hacer clic en el botón "Cancelar"
    const botonNotificar = document.getElementById("boton-notificar");

    botonNotificar.onclick = function() {
        const id = document.getElementById('id_estudiante').value;
        const defensa = document.getElementById('id_defensa').value;

        const form = document.createElement('form');
        form.method = 'GET';
        form.action = `http://sistemasorteodecasos.test/sorteo/enviar-caso/${id}/${defensa}`;

        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        form.appendChild(csrfInput);
        document.body.appendChild(form);

        form.submit();
    };



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
<script>
    //  logica para los buscadores de estudiante
    const inputEstudiante = document.getElementById('buscar_estudiante');
    const buscar = async (text) => {
        try {
            const resultado = await fetch(`http://sistemasorteodecasos.test/api/estudiantes/buscar?q=${text}`);
            if (!resultado.ok) {
                throw new Error(`Error en la solicitud: ${resultado.status}`);
            }
            const datos = await resultado.json();
            return datos;

        } catch (error) {
            console.error('Hubo un problema con la solicitud fetch:', error);
            return null;
        }
    };

    const onChange = (e) => {
        const testudiantes = document.getElementById('estudiantes');
        testudiantes.innerHTML = '';

        buscar(e.target.value).then(response => {

            response.forEach(estudiante => {
                const tr = document.createElement('tr');
                const tdRegistro = document.createElement('td');
                tdRegistro.textContent = estudiante.registro;

                const tdNombreCompleto = document.createElement('td');
                tdNombreCompleto.textContent = estudiante.nombre_completo;

                const tdAccion = document.createElement('td');
                if (estudiante.estado_defensa_interna == 'Pendiente') {
                    tdAccion.innerHTML =
                        '<button onclick="enviarsorteo(\'Defensa interna\', ' + estudiante
                        .id_estudiante + ')" class="sortear-button">Sortear</button>';
                } else {
                    tdAccion.innerHTML =
                        '<button onclick="enviarsorteo(\'Defensa externa\', ' + estudiante
                        .id_estudiante + ')" class="sortear-button">Sortear</button>';
                }
                tr.appendChild(tdRegistro);
                tr.appendChild(tdNombreCompleto);
                tr.appendChild(tdAccion);
                testudiantes.appendChild(tr);
            });
        });
    };
    inputEstudiante.addEventListener('keyup', onChange);

    // logica para el modal de carga
    const showModal = (mensaje) => {
        const modal = document.getElementById('loadingModal');
        const contenedorMensaje = document.getElementById('mensajeSorteo');
        contenedorMensaje.innerHTML = 'SORTEANDO CASO DE ' + mensaje;
        modal.classList.remove('hidden');
    };

    // Función para ocultar el modal
    const hideModal = () => {
        const modal = document.getElementById('loadingModal');
        modal.classList.add('hidden');
    };

    function enviarsorteo(mensaje, id) {

        crearDefensa(id, mensaje);
        showModal(mensaje);
        let tiempoTranscurrido = 0;
        const intervalId = setInterval(() => {
            tiempoTranscurrido += 2;

            const contenedorMensaje = document.getElementById('mensajeSorteo');
            if (tiempoTranscurrido == 2) {
                contenedorMensaje.innerHTML = `Sorteando ${mensaje}`;
            } else if (tiempoTranscurrido == 4) {
                contenedorMensaje.innerHTML = `Sorteando área`;
            } else if (tiempoTranscurrido == 6) {
                contenedorMensaje.innerHTML = `Sorteando caso de estudio`;
            } else {
                contenedorMensaje.innerHTML = `Guardando información...`;
            }

            if (tiempoTranscurrido >= 10) {
                clearInterval(intervalId);
                hideModal();

                const modal = document.getElementById('miModal');
                modal.style.display = 'block';
            }
        }, 2000);


    }
    const crearDefensa = async (id, tipoDefensa) => {
        try {
            const url =
                `{{ route('crear.Defesna', ['id' => '__ID__', 'tipo_defensa' => '__TIPO_DEFENSA__']) }}`
                .replace('__ID__', id).replace('__TIPO_DEFENSA__', tipoDefensa);
                console.log(url);
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
                body: JSON.stringify({
                    tipo_defensa: tipoDefensa
                })
            });
            if (response.ok) {
                const data = await response.json();
                document.getElementById('nombre-estudiante').value = data.nombre_completo;
                document.getElementById('tipo-defensa').value = data.tipo_defensa;
                document.getElementById('fecha-defensa').value = data.fecha;
                document.getElementById('area-asignada').value = data.nombre_area;
                document.getElementById('caso-asignado').value = data.nombre_caso;
                document.getElementById('id_estudiante').value = data.id_estudiante;
                document.getElementById('id_defensa').value = data.id_defensa;
            } else {
                console.error('Error al crear la defensa:', response.statusText);
            }
        } catch (error) {
            console.error('Error en la solicitud:', error);
        }
    };
</script>

<script>
    // logica para buscar por categoria
    const inputCategoria = document.getElementById('buscar_categoria');
    const buscarCasosPorCategoria = async (text) => {
        try {
            const resultado = await fetch(`http://sistemasorteodecasos.test/api/casos/buscar?q=${text}`);
            if (!resultado.ok) {
                throw new Error(`Error en la solicitud: ${resultado.status}`);
            }
            const datos = await resultado.json();
            return datos;

        } catch (error) {
            console.error('Hubo un problema con la solicitud fetch:', error);
            return null;
        }
    };

    const onChangeCategoria = (e) => {
        const tCategorias = document.getElementById('sorteo-tabla-temas');
        tCategorias.innerHTML = '';

        buscarCasosPorCategoria(e.target.value).then(response => {
            if (response && response.length > 0) {
                response.forEach(area => {
                    const divCategoria = document.createElement('div');
                    divCategoria.classList.add('sorteo-categoria');

                    const h3 = document.createElement('h3');
                    h3.innerHTML =
                        `<span class="flecha"></span> ${area.area} (${area.total_casos})`;

                    const ul = document.createElement('ul');
                    ul.classList.add('sorteo-temas');
                    ul.style.display = 'none';

                    area.casos.forEach(caso => {
                        const li = document.createElement('li');
                        li.textContent = caso.descripcion;

                        const spanIcono = document.createElement('span');
                        spanIcono.classList.add('icono-ojito');
                        spanIcono.textContent = '👁️';

                        li.appendChild(spanIcono);
                        ul.appendChild(li);
                    });

                    divCategoria.appendChild(h3);
                    divCategoria.appendChild(ul);
                    tCategorias.appendChild(divCategoria);
                    h3.addEventListener('click', () => {
                        ul.style.display = ul.style.display === 'none' ? 'block' : 'none';
                    });
                });
            } else {
                const noResultados = document.createElement('p');
                noResultados.textContent = 'No se encontraron resultados para esta categoría.';
                tCategorias.appendChild(noResultados);
            }
        });
    };
    inputCategoria.addEventListener('keyup', onChangeCategoria);



    const cambiarEstadoCaso = async (idCaso, estado) => {
        try {
            const nuevoEstado = estado === 'Activo' ? 'Inactivo' : 'Activo'; // Alternar el estado
            const url = `{{ route('editar.caso', ['id' => '__ID__', 'estado' => '__ESTADO__']) }}`
                .replace('__ID__', idCaso)
                .replace('__ESTADO__', nuevoEstado);

            const respuesta = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
            });

            if (!respuesta.ok) {
                throw new Error(`Error en la solicitud: ${respuesta.status}`);
            }

            // Cambiar el ícono dinámicamente
            const ojo = document.querySelector(`span[onclick*="${idCaso}"]`);
            if (ojo) {
                ojo.textContent = nuevoEstado === 'Activo' ? '👁️' : '👁️‍🗨️';
            }


        } catch (error) {
            console.error('Error al cambiar el estado del caso:', error);
            alert(`No se pudo cambiar el estado del caso ${idCaso}: ${error.message}`);
        }
    };
</script>

</html>
