<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/76c068ebe2.js" crossorigin="anonymous"></script>
    @vite(['public/css/login.css'])
</head>

<body class="h-screen bg-gradient-to-b from-red-600 to-gray-900 flex items-center justify-center">
    <div class="w-full max-w-full mx-auto snap-center">
        <!-- Logo and Title -->
        <div class="text-center mb-8">
            <img src="path-to-your-logo.png" alt="Studix" class="mx-auto w-32 h-32">
            <div class="bg-gray-300 border-t-2 border-red-800 py-2 ">
                <p class="text-center text-gray-700 text-lg font-semibold tracking-wide">
                    PLATAFORMA DE SORTEO Y ASIGNACIÓN INTELIGENTE DE CASOS DE ESTUDIO PARA PROYECTOS DE GRADO
                </p>
            </div>
        </div>

        <!-- Login Form -->
        <div class="caja-login">
            <div class="rounded-lg shadow-lg login">
                <div class="flex items-center justify-center mb-4 ">
                    <div class="flex-1 h-1 bg-gray-300"></div>
                    <div class="circulo flex items-center justify-center">
                        <svg class="w-[80px] h-[80px] fill-[#ffffff]" viewBox="0 0 448 512"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M219.3 .5c3.1-.6 6.3-.6 9.4 0l200 40C439.9 42.7 448 52.6 448 64s-8.1 21.3-19.3 23.5L352 102.9V160c0 70.7-57.3 128-128 128s-128-57.3-128-128V102.9L48 93.3v65.1l15.7 78.4c.9 4.7-.3 9.6-3.3 13.3s-7.6 5.9-12.4 5.9H16c-4.8 0-9.3-2.1-12.4-5.9s-4.3-8.6-3.3-13.3L16 158.4V86.6C6.5 83.3 0 74.3 0 64C0 52.6 8.1 42.7 19.3 40.5l200-40zM111.9 327.7c10.5-3.4 21.8 .4 29.4 8.5l71 75.5c6.3 6.7 17 6.7 23.3 0l71-75.5c7.6-8.1 18.9-11.9 29.4-8.5C401 348.6 448 409.4 448 481.3c0 17-13.8 30.7-30.7 30.7H30.7C13.8 512 0 498.2 0 481.3c0-71.9 47-132.7 111.9-153.6z">
                            </path>
                        </svg>
                    </div>
                    <div class="flex-1 h-1 bg-gray-300"></div>
                </div>
                @error('invalid_credentials')
                    <div id="alert" role="alert"
                        class="mt-3 relative flex w-full p-3 text-sm text-white bg-slate-800 rounded-md">
                        {{ $message }}
                        <button
                            class="flex items-center justify-center transition-all w-8 h-8 rounded-md text-white hover:bg-white/10 active:bg-white/10 absolute top-1.5 right-1.5"
                            type="button" onclick="closeAlert()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="h-5 w-5" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <script>
                        // Ocultar la alerta después de 5 segundos (5000ms)
                        setTimeout(function() {
                            document.getElementById('alert').style.display = 'none';
                        }, 5000);

                        // Función para cerrar la alerta al presionar la X
                        function closeAlert() {
                            document.getElementById('alert').style.display = 'none';
                        }
                    </script>
                @enderror
                <form action="{{ route('login.verificar') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="website-admin"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">USUARIO</label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm  border rounded-e-0 border-gray-300 border-e-0 rounded-s-md">
                                <svg class="w-[25px] h-[25px] fill-[#ffffff]" viewBox="0 0 448 512"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z">
                                    </path>
                                </svg>
                            </span>
                            <input
                                class="w-full p-3 text-gray-900 rounded-r-md focus:outline-none focus:ring-2 focus:ring-pink-500"
                                type="text" placeholder="ejemplo" name="usuario" required>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="website-admin"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CONTRASEÑA</label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm  border rounded-e-0 border-gray-300 border-e-0 rounded-s-md">
                                <svg class="w-[25px] h-[25px] fill-[#ffffff]" viewBox="0 0 512 512"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M336 352c97.2 0 176-78.8 176-176S433.2 0 336 0S160 78.8 160 176c0 18.7 2.9 36.8 8.3 53.7L7 391c-4.5 4.5-7 10.6-7 17v80c0 13.3 10.7 24 24 24h80c13.3 0 24-10.7 24-24V448h40c13.3 0 24-10.7 24-24V384h40c6.4 0 12.5-2.5 17-7l33.3-33.3c16.9 5.4 35 8.3 53.7 8.3zM376 96a40 40 0 1 1 0 80 40 40 0 1 1 0-80z">
                                    </path>
                                </svg>
                            </span>
                            <input
                                class="w-full p-3 text-gray-900 rounded-r-md focus:outline-none focus:ring-2 focus:ring-pink-500"
                                type="password" name="password" placeholder="***********" required>
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full bg-pink-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-pink-700 transition duration-300">
                        Ingresar
                    </button>
                </form>
                <div class="mt-4 text-center">
                    <a href="#" class="text-pink-400 hover:underline">Olvidé mi contraseña</a>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <div class="">
            <!-- Contenedor principal que contiene los dos divs -->
            <div class="absolute inset-x-0 bottom-0 flex justify-between items-end p-4">
                <!-- Div para el texto "Desarrollado por UTEPSA" -->
                <div class="text-gray-300">
                    <img src="{{ asset('img/logoDeploy.webp') }}" alt="" style="height: 125px;">
                </div>

                <!-- Div para el texto "SOPORTE: 700123456" -->
                <div class="text-gray-400">
                    <p>SOPORTE: 700123456</p>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
