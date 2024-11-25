<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sorteo de Casos</title>
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
                            <h5 class="text-lg font-semibold text-gray-800">Ing. Gustavo Perez</h5>
                            <h6 class="text-sm text-gray-600">gustavo@perez.com</h6>
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
                            <input type="text" id="fullName" placeholder="Introduzca sus nombres"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <!-- apellidos -->
                        <div class="form-group">
                            <label for="Apellidos" class="block text-sm font-medium text-gray-700">Apellidos</label>
                            <input type="text" id="Apellidos" placeholder="Introduzca sus Apellidos"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <!-- Phone -->
                        <div class="form-group">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Telefono</label>
                            <input type="text" id="Telefono" placeholder="Numero de telefono"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <!-- Email -->
                        <div class="form-group">
                            <label for="eMail" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="eMail" placeholder="Introduzca su correo"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        
                    </div>
                    <div class="mt-8">
                        <h6 class="text-xl font-semibold text-blue-600">Carreras Administradas</h6>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                        <!-- Street -->
                        <div class="form-group">
                            <label for="Street" class="block text-sm font-medium text-gray-700">Street</label>
                            <input type="text" id="Street" placeholder="Enter Street"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <!-- City -->
                        <div class="form-group">
                            <label for="ciTy" class="block text-sm font-medium text-gray-700">City</label>
                            <input type="text" id="ciTy" placeholder="Enter City"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <!-- State -->
                        <div class="form-group">
                            <label for="sTate" class="block text-sm font-medium text-gray-700">State</label>
                            <input type="text" id="sTate" placeholder="Enter State"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <!-- Zip Code -->
                        <div class="form-group">
                            <label for="zIp" class="block text-sm font-medium text-gray-700">Zip Code</label>
                            <input type="text" id="zIp" placeholder="Zip Code"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
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
