<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteo de Casos</title>
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sorteo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sorteo_modal.css') }}">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>
<body>
    
<x-menulateral>
    
</x-menulateral>

<x-contenido-sorteo>
    
</x-contenido-sorteo>

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