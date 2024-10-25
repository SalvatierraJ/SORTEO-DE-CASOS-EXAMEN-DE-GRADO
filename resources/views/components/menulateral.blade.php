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
                <p class="titulo">ingeniero</p>
                <p class="nombre">HERNESTO</p>
            </div>
        </div>
        <div class="nav">
            <div class="menu">
                <p class="titulo">Menu Principal</p>
                <ul>
                    <li>
                        <a href="#">
                            <i class="icon ph-bold ph-house-simple"></i>
                            <span class="text">Menu</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon ph-bold ph-house-simple"></i>
                            <span class="text">otra opcion</span>
                            <i class="arrow ph-bold ph-caret-down"></i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="#">
                                    <span class="text">
                                        opcion 1
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="text">
                                        opcion 2
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#">
                            <i class="icon ph-bold ph-file-text"></i>
                            <span class="text">texto</span>
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
                        <i class="icon ph-bold ph-info"></i>
                        <span class="text">Ajustes</span>
                    </a>
                </li>
                <li >
                    <a href="{{route('logOut')}}">
                        <i class="icon ph-bold ph-sign-out"></i>
                        <span class="text">Salir</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
