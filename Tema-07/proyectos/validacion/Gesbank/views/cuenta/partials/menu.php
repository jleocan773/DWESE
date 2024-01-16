<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= URL ?>cuenta">Cuentas</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>cuenta/new">Nuevo</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Ordenar
                    </a>    
                    <!-- Criterio de ordenación como int -->
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?=URL?>cuenta/order/1">Id</a></li>
                        <li><a class="dropdown-item" href="<?=URL?>cuenta/order/2">Número Cuenta</a></li>
                        <li><a class="dropdown-item" href="<?=URL?>cuenta/order/3">Nombre Cliente</a></li>
                        <li><a class="dropdown-item" href="<?=URL?>cuenta/order/4">Apellido Cliente</a></li>
                        <li><a class="dropdown-item" href="<?=URL?>cuenta/order/5">Fecha Alta</a></li>
                        <li><a class="dropdown-item" href="<?=URL?>cuenta/order/6">Fecha Último Movimiento</a></li>
                        <li><a class="dropdown-item" href="<?=URL?>cuenta/order/7">Número Movimientos</a></li>
                        <li><a class="dropdown-item" href="<?=URL?>cuenta/order/8">Saldo</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex" role="search" method="GET" action="<?=URL?>cuenta/filter">
                <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search" name="expresion">
                <button class="btn btn-outline-secondary" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</nav>

