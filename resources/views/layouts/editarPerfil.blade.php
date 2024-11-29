<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sorteo de Casos</title>
    @vite(['public/css/barra.css'])
    @vite(['public/css/menu.css'])
    @vite(['resources/css/perfil.css'])
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

    <div class="container mx-auto p-6">
        <div class="flex flex-wrap ">
            <!-- Profile Card -->
            <div class="w-full lg:w-1/4">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <div class="account-settings">
                        <div class="user-profile text-center">
                            <div class="user-avatar mb-4">
                                <img class="w-32 h-32 rounded-full mx-auto"
                                    src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
                            </div>
                            @if (Auth::check())
                                <h5 class="text-lg font-semibold text-gray-800">Ing.{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}  </h5>
                                <h6 class="text-sm text-gray-600">{{Auth::user()->correo}}</h6>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
            <!-- Personal Details Card -->
            <div class="w-full lg:w-3/4">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <div class="mb-6">
                        <h6 class="text-xl font-semibold text-blue-600">Detalles Personales</h6>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- nombres -->
                        <div class="form-group">
                            <label for="fullName" class="block text-sm font-medium text-gray-700">Nombres</label>
                            <input type="text" id="fullName" placeholder="Introduzca sus nombres" value="{{Auth::user()->nombre}}"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <!-- apellidos -->
                        <div class="form-group">
                            <label for="Apellidos" class="block text-sm font-medium text-gray-700">Apellidos</label>
                            <input type="text" id="Apellidos" placeholder="Introduzca sus Apellidos" value="{{Auth::user()->apellido}}"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <!-- Phone -->
                        <div class="form-group">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Telefono</label>
                            <input type="text" id="Telefono" placeholder="Numero de telefono" value="{{Auth::user()->telefono}}"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <!-- Email -->
                        <div class="form-group">
                            <label for="eMail" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="eMail" placeholder="Introduzca su correo" value="{{Auth::user()->correo}}"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>

                    </div>
                    <div class="mt-8">
                        <h6 class="text-xl font-semibold text-blue-600">Carreras Administradas</h6>
                    </div>
                    <div class=" gap-6 mt-4">
                        <div class="container bg-white mx-auto p-6">
                            <div class="flex flex-wrap gap-6 border-2 border-gray-300 p-6 rounded-lg shadow-lg"
                                style="    justify-content: center;">
                                <!-- Carrera 1 -->
                                <div
                                    class="relative bg-white border border-gray-300 p-4 w-32 h-16 rounded-lg shadow-md transition transform hover:scale-105 hover:shadow-lg">
                                    <span
                                        class="absolute top-2 right-2 text-xl text-red-500 cursor-pointer hover:text-red-700">×</span>
                                    <p class="text-center text-lg font-semibold text-gray-800">Sistemas</p>
                                </div>
                                <!-- Carrera 2 -->
                                <div
                                    class="relative bg-white border border-gray-300 p-4  w-32 h-16 rounded-lg shadow-md transition transform hover:scale-105 hover:shadow-lg">
                                    <span
                                        class="absolute top-2 right-2 text-xl text-red-500 cursor-pointer hover:text-red-700">×</span>
                                    <p class="text-center text-lg font-semibold text-gray-800">Redes</p>
                                </div>
                                <!-- Carrera 3 -->
                                <div
                                    class="relative bg-white border border-gray-300 p-4  w-32 h-16 rounded-lg shadow-md transition transform hover:scale-105 hover:shadow-lg">
                                    <span
                                        class="absolute top-2 right-2 text-xl text-red-500 cursor-pointer hover:text-red-700">×</span>
                                    <p class="text-center text-lg font-semibold text-gray-800">Medicina</p>
                                </div>
                                <!-- Carrera 3 -->
                                <div
                                    class="relative bg-white border border-gray-300 p-4  w-32 h-16 rounded-lg shadow-md transition transform hover:scale-105 hover:shadow-lg">
                                    <span
                                        class="absolute top-2 right-2 text-xl text-red-500 cursor-pointer hover:text-red-700">×</span>
                                    <p class="text-center text-lg font-semibold text-gray-800">Medicina</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="flex justify-end mt-6">

                        <button type="button"
                            class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"
    integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw=="
    crossorigin="anonymous"></script>
@vite(['resources/js/menu.js'])


</html>
