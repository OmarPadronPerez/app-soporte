<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">logo ABG</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/nuevo">Nuevo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="/tickets">Tickets</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/historial">Historial</a>
                </li>

                @if (Session::get('area') == "SOPORTE")
                    <span class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Administrar
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/usuarios">Usuarios</a></li>
                            <li><a class="dropdown-item" href="/reportes">Reportes</a></li>
                        </ul>
                    </span>
                @endif

            </ul>
            <span class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Hola {{ Session::get('nombre') }}
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/logout">Cerrar sesion</a></li>
                </ul>
            </span>
        </div>
    </div>
</nav>
