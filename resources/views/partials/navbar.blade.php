<nav class="navbar navbar-expand-md navbar-dark bg-primary-e shadow-sm p-0 mb-2">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/home') }}">
            <img src="img/Logo ETICOM puntos.svg" alt="EtiSys" height="30">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @guest
            @else
                <ul class="navbar-nav me-auto">
                    @if (session('AccesoUsuarios') == 1)
                        <li class="nav-item">
                            <a class="nav-link cursor-pointer {{ request()->is('usuarios*') ? 'active' : '' }}"
                                onclick="usuarios()">Usuarios
                            </a>
                        </li>
                    @endif
                    @if (session('AccesoCatalogos') == 1)
                        <li class="nav-item">
                            <a class="nav-link cursor-pointer {{ request()->is('catalogos*') ? 'active' : '' }}"
                                onclick="catalogos()">Catálogos
                            </a>
                        </li>
                    @endif
                    {{-- <li class="nav-item dropdown" style="width: 145px">
                    <a class="nav-link dropbtn" href="#">
                        Catálogos <i class="fas fa-chevron-down mt-1" style="float: right"></i>
                    </a>

                    <div class="dropdown-content bg-primary-e text-white" style="width: 200px">
                        <a class="text-white" href="">
                            Grupos
                        </a>
                        <a class="text-white" href="">
                            Tipos de Actividades
                        </a>
                        <a class="text-white" href="">
                            Tipos de Empresa
                        </a>
                        <a class="text-white" href="">
                            Origenes
                        </a>
                        <a class="text-white" href="">
                            Sectores
                        </a>
                        <a class="text-white" href="">
                            Tipos de Télefono
                        </a>
                        <a class="text-white" href="">
                            Tabla de Escalas
                        </a>
                        <a class="text-white" href="">
                            Tipos de Papel
                        </a>
                        <a class="text-white" href="">
                            Tipos de Producto
                        </a>
                        <div class="dropdown-l2">
                            <a class="text-white dropbtn-l2" href="#">
                                Suajes <i class="fas fa-chevron-right mt-1" style="float: right"></i>
                            </a>
                            <div class="dropdown-content-l2 bg-primary-e text-white">
                                <a class="text-white" href="#">MAGNETICOS FLEXO MEXICO</a>
                                <a class="text-white" href="#">SOLIDOS FLEXO MEXICO</a>
                                <a class="text-white" href="#">DIGITALES MEXICO</a>
                                <a class="text-white" href="#">MAGNETICOS FLEXO MONTERREY</a>
                                <a class="text-white" href="#">SOLIDOS FLEXO MONTERREY</a>
                            </div>
                        </div>
                        <a class="text-white" href="">
                            Distribución de Grabados
                        </a>
                        <a class="text-white" href="">
                            Estatus de OP
                        </a>
                        <a class="text-white" href="">
                            Operadores / Supervisores
                        </a>
                        <a class="text-white" href="">
                            M+aquinas
                        </a>
                        <a class="text-white" href="">
                            Insumos
                        </a>
                        <a class="text-white" href="">
                            Carga Sepomex
                        </a>
                        <a class="text-white" href="">
                            Parámetros
                        </a>
                        <a class="text-white" href="">
                            Acabados
                        </a>
                        <div class="dropdown-l2">
                            <a class="text-white dropbtn-l2" href="#">
                                Digital <i class="fas fa-chevron-right mt-1" style="float: right"></i>
                            </a>
                            <div class="dropdown-content-l2 bg-primary-e text-white">
                                <a class="text-white" href="#">Máquinas Digitales</a>
                                <a class="text-white" href="#">Costo Equipo</a>
                                <div class="dropdown-l3">
                                    <a class="text-white dropbtn-l3" href="#">
                                        Consumibles <i class="fas fa-chevron-right mt-1" style="float: right"></i>
                                    </a>
                                    <div class="dropdown-content-l3 bg-primary-e text-white">
                                        <a class="text-white" href="#">Consumibles / Mantenimiento</a>
                                        <a class="text-white" href="#">Precio Electro Ink</a>
                                    </div>
                                </div>
                                <a class="text-white" href="#">Parámetros Captura Cotizaciones</a>
                            </div>
                        </div>
                        <div class="dropdown-l2">
                            <a class="text-white dropbtn-l2" href="#">
                                Flexo <i class="fas fa-chevron-right mt-1" style="float: right"></i>
                            </a>
                            <div class="dropdown-content-l2 bg-primary-e text-white">
                                <a class="text-white" href="#">Costo Equipo</a>
                                <a class="text-white" href="#">Parámetros Captura Cotizaciones</a>
                                <a class="text-white" href="#">Cavidades al Eje</a>
                            </div>
                        </div>
                    </div>
                </li> --}}
                    @if (session('AccesoClientes') == 1)
                        <li class="nav-item">
                            <a class="nav-link cursor-pointer {{ request()->is('clientes*') ? 'active' : '' }}"
                                onclick="clientes()">Clientes
                            </a>
                        </li>
                    @endif
                    @if (session('AccesoFacturacion') == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="#">Facturación
                            </a>
                        </li>
                    @endif
                    @if (session('AccesoCxC') == 1)
                        <li class="nav-item">
                            <a class="nav-link cursor-pointer {{ request()->is('cxc*') ? 'active' : '' }}"
                                onclick="cxc()">CxC
                            </a>
                        </li>
                    @endif

                    {{-- <li class="nav-item">
                    <a class="nav-link" href="#">Actividades
                    </a>
                </li> --}}

                    {{-- <li class="nav-item">
                    <a class="nav-link" href="#">Producción
                    </a>
                </li> --}}

                    {{-- <li class="nav-item">
                    <a class="nav-link" href="#">OPs
                    </a>
                </li> --}}

                    {{-- <li class="nav-item">
                    <a class="nav-link" href="#">Inventarios
                    </a>
                </li> --}}
                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" style="font-size: 18px; cursor: default">
                            <i class="fa-solid fa-user-circle" style="font-size: 18px"></i>
                            {{ Auth::user()->name }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a id="ddUser" class="nav-link" href="{{ route('logout') }}" style="font-size: 14px !important"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Salir <i class="fas fa-power-off"></i>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                    {{-- <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropbtn" href="#">
                        <i class="fa-solid fa-user-circle" style="font-size: 18px"></i>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-content bg-primary-e text-white" style="z-index: 3">
                        <a id="ddUser" class="bg-primary text-white" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            Salir <i class="fas fa-power-off"></i>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li> --}}
                </ul>
            @endguest
        </div>
    </div>
</nav>
<script>
    // navbarDropdown = document.getElementById('navbarDropdown');
    // ddUser = document.getElementById('ddUser');

    // ddUser.style.width = navbarDropdown.clientWidth + 'px';
    // console.log(ddUser);
</script>
