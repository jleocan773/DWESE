<!DOCTYPE html>
<html lang="es">

<head>
    <!-- head -->
    <?php require_once("template/partials/head.php");  ?>
    <title>usuarios - Gesbank</title>
</head>

<body>
    <div class="container" style="padding-top: 2%;">
        <!-- menu fijo superior -->
        <?php require_once "template/partials/menuAut.php"; ?>
        <br><br>

        <!-- cabecera  -->
        <?php include "views/usuarios/partials/header.php" ?>

        <!-- Mensaje de Error -->
        <?php include 'template/partials/mensaje.php' ?>

        <!-- Menu principal -->
        <?php require_once "views/usuarios/partials/menu.php" ?>

        <table class="table">
            <thead>
                <tr>
                    <th>Id </th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->usuarios as $usuario) : ?>
                    <tr>
                        <td><?= $usuario->id ?></td>
                        <td><?= $usuario->name ?></td>
                        <td><?= $usuario->email ?></td>
                        <td><?= $this->model->getRoleOfUser($usuario->id)->name ?></td>

                        <!-- botones de acción -->
                        <td>
                            <!-- botón eliminar -->
                            <a href="<?= URL ?>usuarios/delete/<?= $usuario->id ?>" title="Eliminar" class="btn btn-danger <?= (!in_array($_SESSION['id_rol'], $GLOBALS['usuarios']['delete'])) ? 'disabled' : '' ?>" onclick="return confirm('Confirmar eliminación del Cliente')">
                                <i class="bi bi-trash"></i>
                            </a>

                            <!-- botón editar -->
                            <a href="<?= URL ?>usuarios/editar/<?= $usuario->id ?>" title="Editar" class="btn btn-primary <?= (!in_array($_SESSION['id_rol'], $GLOBALS['usuarios']['editar'])) ? 'disabled' : '' ?>">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <!-- botón mostrar -->
                            <a href="<?= URL ?>usuarios/mostrar/<?= $usuario->id ?>" title="Mostrar" class="btn btn-warning <?= (!in_array($_SESSION['id_rol'], $GLOBALS['usuarios']['mostrar'])) ? 'disabled' : '' ?>">
                                <i class="bi bi-card-text"></i>
                            </a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">Nº Registros: <?= $this->usuarios->rowCount() ?> </td>
                </tr>
            </tfoot>

        </table>

    </div>

    <!-- footer -->
    <?php require_once "template/partials/footer.php" ?>

    <!-- Bootstrap JS y popper -->
    <?php require_once "template/partials/javascript.php" ?>
</body>

</html>