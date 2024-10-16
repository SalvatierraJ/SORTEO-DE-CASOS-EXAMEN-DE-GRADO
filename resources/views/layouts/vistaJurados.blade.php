<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vistaJurado.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">

    <title>Document</title>
</head>

<body>
<x-menulateral>
    
</x-menulateral>
    
<div class="content">
    <div class="header">
        <h2>GESTIÓN DE JURADOS</h2>
        <div class="add-icon">
        <button  id="myBtn"><img src="{{asset('img/agregar-usuario.png')}}" alt="Agregar Jurado"></button>
            <div id="myModal" class="modal">

                <div class="modal-content">
                    <div class="modal-header">
                    <label class="nuevoJurado">Nuevo Jurado</label>
                    <span class="close">&times;</span>
                    <form id="juradoForm" class="modal-body">
                        <div class="form-group">
                            <label for="registro">Registro:</label>
                            <input type="text" id="registro" name="registro" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido:</label>
                            <input type="text" id="apellido" name="apellido" required>
                        </div>
                        <div class="form-group">
                            <label for="titulo">Título:</label>
                            <select id="titulo" name="titulo" required>
                            <option value="">Seleccione</option>
                            <option value="Licenciado">Licenciado</option>
                            <option value="Ingeniero">Ingeniero</option>
                            <option value="Doctor">Doctor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono:</label>
                            <input type="tel" id="telefono" name="telefono" required>
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo:</label>
                            <input type="email" id="correo" name="correo" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="cancelBtn" class="btn btn-secondary">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Aceptar</button>
                        </div>
                        </form>

                </div>
            </div>

            </div>
        </div>
    </div>


    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Título</th>
                <th>Nombre Completo</th>
                <th>Celular</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Ingeniero</td>
                <td>Lucas Gómez Rocha</td>
                <td>71234555</td>
                <td><a href="#"><img src="{{ asset('img/editar.png') }}" alt="Editar" class="edit-icon" id="Editar">

                </div>
                </div></a></td>
            </tr>   
            <tr>
                <td>2</td>
                <td>Licenciado</td>
                <td>Sofía Martínez Pitz</td>
                <td>71234556</td>
                <td><a href="#"><img src="{{ asset('img/editar.png') }}" alt="Editar" class="edit-icon"></a></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Magister</td>
                <td>Andrés Silva Ulrik</td>
                <td>71234557</td>
                <td><a href="#"><img src="{{ asset('img/editar.png') }}" alt="Editar" class="edit-icon"></a></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Doctor</td>
                <td>Diego Fernández Hernandez</td>
                <td>71234558</td>
                <td><a href="#"><img src="{{ asset('img/editar.png') }}" alt="Editar" class="edit-icon"></a></td>
            </tr>
            <tr>
                <td>5</td>
                <td>Licenciado</td>
                <td>María López Degadillo</td>
                <td>71234559</td>
                <td><a href="#"><img src="{{ asset('img/editar.png') }}" alt="Editar" class="edit-icon"></a></td>
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
