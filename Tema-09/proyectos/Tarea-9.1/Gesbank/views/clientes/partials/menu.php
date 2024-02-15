<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= URL ?>clientes">Clientes</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= (in_array($_SESSION['id_rol'], $GLOBALS['clientes']['nuevo']) || in_array($_SESSION['id_rol'], $GLOBALS['clientes']['nuevo'])) ? 'active' : 'disabled' ?>" aria-current="page" href="<?= URL ?>clientes/nuevo">Nuevo</a>
                </li>
                <!-- Agregar opción para exportar CSV -->
                <li class="nav-item">
                    <a class="nav-link <?= (in_array($_SESSION['id_rol'], $GLOBALS['clientes']['exportar']) || in_array($_SESSION['id_rol'], $GLOBALS['clientes']['exportar'])) ? 'active' : 'disabled' ?>"" href=" <?= URL ?>clientes/exportar">Exportar CSV</a>
                </li>
                <!-- Agregar opción para importar CSV -->
                <li class="nav-item">
                    <button type="button" class="nav-link btn btn-link <?= (in_array($_SESSION['id_rol'], $GLOBALS['clientes']['importar']) || in_array($_SESSION['id_rol'], $GLOBALS['clientes']['importar'])) ? '' : 'disabled' ?>" data-bs-toggle="modal" data-bs-target="#importarModal">Importar CSV</button>
                </li>
                <!-- PDF -->
                <li class="nav-item">
                    <a class="nav-link <?= (in_array($_SESSION['id_rol'], $GLOBALS['clientes']['pdf']) || in_array($_SESSION['id_rol'], $GLOBALS['clientes']['pdf'])) ? 'active' : 'disabled' ?>" aria-current="page" href="<?= URL ?>clientes/pdf">PDF</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link <?= in_array($_SESSION['id_rol'], $GLOBALS['clientes']['ordenar']) ? 'active' : 'disabled' ?> dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Ordenar
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?= URL ?>clientes/ordenar/1">ID</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>clientes/ordenar/2">Cliente</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>clientes/ordenar/6">Email</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>clientes/ordenar/3">Telefono</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>clientes/ordenar/5">dni</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>clientes/ordenar/4">ciudad</a></li>
                    </ul>
                </li>

            </ul>
            <form class="d-flex" method="get" action="<?= URL ?>clientes/buscar">
                <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search" name="expresion">
                <button class="btn btn-outline-secondary" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</nav>