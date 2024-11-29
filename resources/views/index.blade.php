<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/76c068ebe2.js" crossorigin="anonymous"></script>
    <style>
        :root {
            --background-image: url('{{ asset('img/fondoJaguar.jpg') }}');
        }

        .flex {
            display: flex;
        }

        .items-center {
            align-items: center;
        }

        .justify-center {
            justify-content: center;
        }

        .gap-4 {
            gap: 1rem;
            /* Espacio entre la imagen y el texto */
        }

        .university-text {
            font-family: 'Arial', sans-serif;
            font-size: 1.5rem;
            /* Tamaño de la fuente */
            font-weight: bold;
            /* Texto en negrita */
            color: #f7f3f4;
            /* Color personalizado */
            text-transform: uppercase;
            /* Texto en mayúsculas */
            letter-spacing: 0.05em;
            /* Espaciado entre letras */
        }
    </style>
    @vite(['public/css/login.css'])
</head>

<body class="h-screen  items-center justify-center">
    <div class="w-full max-w-full mx-auto snap-center">
        <!-- Logo and Title -->
        <div class="text-center mb-8">
            <div class="flex items-center justify-center gap-4">
               
            </div>
            <div class="bg-gray-300 border-t-2 border-red-800 py-2">
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
                        <img src="{{ asset('img/30blanco.png') }}" alt="Studix" class="w-32 h-32">
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
                            class="block mb-2 text-sm font-medium text-white dark:text-white">USUARIO</label>
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
                            class="block mb-2 text-sm font-medium text-white dark:text-white">CONTRASEÑA</label>
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
            <div class="absolute inset-x-0 bottom-0 flex justify-between items-end p-4" style="    z-index: -1;">
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
