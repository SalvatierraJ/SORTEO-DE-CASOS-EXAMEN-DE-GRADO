<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleGestionCasos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">

    <title>Document</title>
</head>

<body>
<x-menulateral>
    
</x-menulateral>
    
<div class="content">
    <div class="header">
        <h2>GESTIÓN DE CASOS</h2>
        <div class="add-icon">
        <button  id="myBtn"><img src="{{asset('img/agregar-usuario.png')}}" alt="Agregar Caso"></button>
            <!-- Botón para abrir el modal -->
    <button id="openModalBtn">Abrir Modal</button>

<!-- Modal -->
<div id="myModal" class="modal">

  <!-- Contenido del Modal -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Nuevo Caso</h2>
    
    <!-- Textboxs para nombre y categoría -->
    <input type="text" placeholder="Nombre" id="nombre">
    <input type="text" placeholder="Categoría" id="categoria">

    <!-- Sección para añadir archivo -->
    <div class="file-input">
        <label for="file-input">
            <img src="https://img.icons8.com/ios-glyphs/30/000000/file.png"/>
            Elegir archivo
        </label>
        <input type="file" id="file-input">
    </div>

    <!-- Área de arrastrar y soltar archivos -->
    <div class="drop-area" id="drop-area">
        Arrastra y suelta archivos aquí
    </div>

    <!-- Footer con botones -->
    <div class="modal-footer">
      <button class="btn btn-secondary">Cancelar</button>
      <button class="btn btn-primary">Aceptar</button>
    </div>
  </div>

</div>
        </div>
    </div>


    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Caso</th>
                <th>Categoria</th>
                <th>Editar</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Desarrollo de una Aplicación Web para la Gestión de Inventarios en PYMEs</td>
                <td>Tecnología de la Información</td>
                <td>Boton Editar / Borrar</td>
                <td><a href="#"><i class="edit-icon"></i></a></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Desarrollo de una Aplicación Web para la Gestión de Inventarios en PYMEs</td>
                <td>Tecnología de la Información</td>
                <td>Boton Editar / Borrar</td>
                <td><a href="#"><i class="edit-icon"></i></a></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Desarrollo de una Aplicación Web para la Gestión de Inventarios en PYMEs</td>
                <td>Tecnología de la Información</td>
                <td>Boton Editar / Borrar</td>
                <td><a href="#"><i class="edit-icon"></i></a></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Desarrollo de una Aplicación Web para la Gestión de Inventarios en PYMEs</td>
                <td>Tecnología de la Información</td>
                <td>Boton Editar / Borrar</td>
                <td><a href="#"><i class="edit-icon"></i></a></td>
            </tr>
            <tr>
                <td>5</td>
                <td>Desarrollo de una Aplicación Web para la Gestión de Inventarios en PYMEs</td>
                <td>Tecnología de la Información</td>
                <td>Boton Editar / Borrar</td>
                <td><a href="#"><i class="edit-icon"></i></a></td>
            </tr>
            </tbody>
        </table>
        
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"
    integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw=="
    crossorigin="anonymous">
</script>

@vite(['resources/js/menu.js'])
@vite(['resources/js/funcionModal.js'])
</html>