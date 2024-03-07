<!DOCTYPE html>
<html lang="es">

<head>
    <!-- head -->
    <?php require_once("template/partials/head.php");  ?>
    <title>Cuentas - Gesbank</title>
</head>

<body>
    <div class="container" style="padding-top: 2%;">
        <!-- menu fijo superior -->
        <?php require_once "template/partials/menuAut.php"; ?>
        <br><br>

        <!-- cabecera  -->
        <?php include "views/cuentas/partials/header.php" ?>

        <!-- Mensaje de Error -->
        <?php include 'template/partials/mensaje.php' ?>

        <!-- Menu principal -->
        <?php require_once "views/cuentas/partials/menu.php" ?>

        <!-- Modal -->
        <?php require "views/cuentas/partials/modal.php" ?>

        <table class="table">
            <thead>
                <tr>
                    <th>Id </th>
                    <th>Numero de cuenta</th>
                    <th>Cliente</th>
                    <th>Fecha Alta</th>
                    <th>Fecha Últ Mov</th>
                    <th class="text-end">Num_movtos</th>
                    <th class="text-end">Saldo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->cuentas as $cuenta) : ?>
                    <tr>
                        <td><?= $cuenta->id ?></td>
                        <td><?= $cuenta->num_cuenta ?></td>
                        <td><?= $cuenta->cliente ?></td>
                        <td><?= $cuenta->fecha_alta ?></td>
                        <td><?= $cuenta->fecha_ul_mov ?></td>
                        <td class="text-end"><?= number_format($cuenta->num_movtos, 0, ',', '.') ?></td>
                        <td class="text-end"><?= number_format($cuenta->saldo, 2, ',', '.') ?> €</td>

                        <!-- botones de acción -->
                        <td>
                            <!-- botón eliminar -->
                            <a href="<?= URL ?>cuentas/delete/<?= $cuenta->id ?>" title="Eliminar" class="btn btn-danger <?= (!in_array($_SESSION['id_rol'], $GLOBALS['cuentas']['delete'])) ? 'disabled' : '' ?>" onclick="return confirm('Confirmar eliminación del Cliente')">
                                <i class="bi bi-trash"></i>
                            </a>

                            <!-- botón editar -->
                            <a href="<?= URL ?>cuentas/editar/<?= $cuenta->id ?>" title="Editar" class="btn btn-primary <?= (!in_array($_SESSION['id_rol'], $GLOBALS['cuentas']['editar'])) ? 'disabled' : '' ?>">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <!-- botón mostrar -->
                            <a href="<?= URL ?>cuentas/mostrar/<?= $cuenta->id ?>" title="Mostrar" class="btn btn-warning <?= (!in_array($_SESSION['id_rol'], $GLOBALS['cuentas']['mostrar'])) ? 'disabled' : '' ?>">
                                <i class="bi bi-card-text"></i>
                            </a>

                            <!-- botón mostrar movimientos-->
                            <a href="<?= URL ?>cuentas/listarMovimientos/<?= $cuenta->id ?>" title="ListarMovimientos" class="btn btn-info <?= (!in_array($_SESSION['id_rol'], $GLOBALS['cuentas']['listarMovimientos'])) ? 'disabled' : '' ?>">
                                <i class="bi bi-journal"></i>
                            </a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="9">Nº Registros: <?= $this->cuentas->rowCount() ?> </td>
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