<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= URL ?>movimientos">Movimientos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= (in_array($_SESSION['id_rol'], $GLOBALS['movimientos']['nuevo']) || in_array($_SESSION['id_rol'], $GLOBALS['movimientos']['nuevo'])) ? 'active' : 'disabled' ?>" aria-current="page" href="<?= URL ?>movimientos/nuevo">Nuevo</a>
                </li>
                <!-- Agregar opción para exportar CSV -->
                <li class="nav-item">
                    <a class="nav-link <?= (in_array($_SESSION['id_rol'], $GLOBALS['movimientos']['exportar']) || in_array($_SESSION['id_rol'], $GLOBALS['movimientos']['exportar'])) ? 'active' : 'disabled' ?>"" href=" <?= URL ?>movimientos/exportar">Exportar CSV</a>
                </li>
                <!-- Agregar opción para importar CSV -->
                <li class="nav-item">
                    <button type="button" class="nav-link btn btn-link <?= (in_array($_SESSION['id_rol'], $GLOBALS['movimientos']['importar']) || in_array($_SESSION['id_rol'], $GLOBALS['movimientos']['importar'])) ? '' : 'disabled' ?>" data-bs-toggle="modal" data-bs-target="#importarModal">Importar CSV</button>
                </li>
                <!-- PDF -->
                <li class="nav-item">
                    <a class="nav-link <?= (in_array($_SESSION['id_rol'], $GLOBALS['movimientos']['pdf']) || in_array($_SESSION['id_rol'], $GLOBALS['movimientos']['pdf'])) ? 'active' : 'disabled' ?>" aria-current="page" href="<?= URL ?>movimientos/pdf">PDF</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link <?= in_array($_SESSION['id_rol'], $GLOBALS['movimientos']['ordenar']) ? 'active' : 'disabled' ?> dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Ordenar
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?= URL ?>movimientos/ordenar/1">ID</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>movimientos/ordenar/2">Nº Cuenta</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>movimientos/ordenar/3">Fecha Hora</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>movimientos/ordenar/4">Concepto</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>movimientos/ordenar/5">Tipo</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>movimientos/ordenar/6">Cantidad</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>movimientos/ordenar/7">Saldo</a></li>
                    </ul>
                </li>

            </ul>
            <form class="d-flex" method="get" action="<?= URL ?>movimientos/buscar">
                <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search" name="expresion">
                <button class="btn btn-outline-secondary" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</nav>