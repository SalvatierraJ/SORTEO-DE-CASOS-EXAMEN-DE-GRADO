<!-- resources/views/iniciio.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sorteo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sorteo_modal.css') }}">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <title>Sorteo de Casos</title>
</head>
<body>
<x-menulateral></x-menulateral>
<x-contenido-sorteo></x-contenido-sorteo>
</body>

</html>
@vite(['resources/js/menu.js'])

<!-- habilitar funcionalidad del panel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"
    integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw=="
    crossorigin="anonymous">
</script>



