<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= URL ?>cuentas">Cuentas</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= URL ?>cuentas/nuevo">Nuevo</a>
                </li>
                <!-- Agregar opción para exportar CSV -->
                <li class="nav-item">
                    <a class="nav-link <?= (in_array($_SESSION['id_rol'], $GLOBALS['cuentas']['exportar']) || in_array($_SESSION['id_rol'], $GLOBALS['cuentas']['exportar'])) ? 'active' : 'disabled' ?>"" href=" <?= URL ?>cuentas/exportar">Exportar CSV</a>
                </li>
                <!-- Agregar opción para importar CSV -->
                <li class="nav-item">
                    <button type="button" class="nav-link btn btn-link <?= (in_array($_SESSION['id_rol'], $GLOBALS['cuentas']['importar']) || in_array($_SESSION['id_rol'], $GLOBALS['cuentas']['importar'])) ? '' : 'disabled' ?>" data-bs-toggle="modal" data-bs-target="#importarModal">Importar CSV</button>
                </li>
                <!-- PDF -->
                <li class="nav-item">
                    <a class="nav-link <?= (in_array($_SESSION['id_rol'], $GLOBALS['cuentas']['pdf']) || in_array($_SESSION['id_rol'], $GLOBALS['cuentas']['pdf'])) ? 'active' : 'disabled' ?>" aria-current="page" href="<?= URL ?>cuentas/pdf">PDF</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Ordenar
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?= URL ?>cuentas/ordenar/1">Id</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>cuentas/ordenar/2">Nº de cuenta</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>cuentas/ordenar/8">Titular</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>cuentas/ordenar/4">Fecha</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>cuentas/ordenar/5">Fecha Ult. Mov.</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>cuentas/ordenar/6">Nº Movimientos</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>cuentas/ordenar/7">saldo</a></li>
                    </ul>
                </li>

            </ul>
            <form class="d-flex" method="get" action="<?= URL ?>cuentas/buscar">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="expresion">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>