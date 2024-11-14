<div class="contenedorMenu">
    <div class="slidebar active">
        <div class="menu-btn">
            <i class="ph-bold ph-caret-left"></i>
        </div>
        <div class="head">
            <div class="user-img">
                <img src="{{ asset('img/usuario.png') }}" alt="">
            </div>
            <div class="detalles-usuario">
                <p class="titulo">Ingeniero</p>
                @if (Auth::check())
                    <p class="nombre">{{ Auth::user()->nombre }}</p>
                @endif

            </div>
        </div>
        <div class="nav">
            <div class="menu">
                <p class="titulo">Menu Principal</p>
                <ul>
                    <li>
                        <a href="{{route('dashboard')}}">
                            <i class="ph-bold ph-house"></i> <!-- Icono de casa para "Menu" -->
                            <span class="text">Menu</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/gestion-de-estudiantes') }}">
                            <i class="ph-bold ph-student"></i>
                            <!-- Icono de estudiante para "Gestión de Estudiantes" -->
                            <span class="text">Gestión de Estudiantes</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/jurados') }}">
                            <i class="ph-bold ph-gavel"></i> <!-- Icono de mazo para "Jurados" -->
                            <span class="text">Jurados</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/gestion-de-casos') }}">
                            <i class="ph-bold ph-briefcase"></i> <!-- Icono de portafolio para "Gestión de Casos" -->
                            <span class="text">Gestión de Casos</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/sorteo') }}">
                            <i class="ph-bold ph-shuffle"></i> <!-- Icono de sorteo para "Sorteo" -->
                            <span class="text">Sorteo</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/evaluaciones') }}">
                            <i class="ph-bold ph-clipboard"></i> <!-- Icono de clipboard para "Evaluaciones" -->
                            <span class="text">Evaluaciones</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="menu">
            <p class="titulo">Cuenta</p>
            <ul>
                <li>
                    <a href="#">
                        <i class="ph-bold ph-gear"></i> <!-- Icono de engranaje para "Ajustes" -->
                        <span class="text">Ajustes</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logOut') }}">
                        <i class="ph-bold ph-sign-out"></i> <!-- Icono de salida para "Salir" -->
                        <span class="text">Salir</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
