<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= URL ?>">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="<?= URL ?>alumno">Alumnos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>alumno/new">Nuevo</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Ordenar
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= URL ?>">Nombre</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>">Email</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>">Teléfono</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>">Población</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>">DNI</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>">Edad</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>">Curso</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex" role="search" method="GET" action="filtrar.php">
                <input class="form-control me-2" type="search"  aria-label="Search" name="expresion">
                <button class="btn btn-outline-secondary" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</nav>