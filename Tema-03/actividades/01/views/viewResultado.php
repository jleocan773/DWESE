<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/head.html' ?>
    <!-- Incluir head -->
    <title>Información Perfil</title>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-person-circle"></i></i> Información Perfil
            <span class="fs-6"></span>
        </header>


        <legend>Menú</legend>
        <nav>
            <ul class="nav">
                <?php if ($perfil == "administrador" || $perfil == "editor") : ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Nuevo</a>
                    </li>
                <?php endif; ?>
                <?php if ($perfil == "administrador") : ?>
                <li class="nav-item">
                    <a class="nav-link" href="#">Eliminar</a>
                </li>
                <?php endif; ?>
                <?php if ($perfil == "administrador" || $perfil == "editor") : ?>
                <li class="nav-item">
                    <a class="nav-link" href="#">Actualizar</a>
                </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="#">Consultar</a>
                </li>

            </ul>
        </nav>

        <legend>Información Perfil</legend>
        <table class="table">
            <tbody>
                <tr>
                    <th>Usuario</th>
                    <td><?= $usuario ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= $email ?></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><?= $password ?></td>
                </tr>
                <tr>
                    <th>Password Confirmación</th>
                    <td><?= $passwordConfirmation ?></td>
                </tr>
                <tr>
                    <th>Perfil</th>
                    <td><?= $perfil ?></td>
                </tr>
            </tbody>
        </table>

        <div class="btn-group" role="group">
            <a class="btn btn-primary" href="index.php" role="button">Volver</a>
        </div>


        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>