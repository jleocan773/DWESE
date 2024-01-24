<!DOCTYPE html>
<html lang="es">

<head>
    <!-- head -->
    <?php require_once("template/partials/head.php");  ?>
    <title>Cuentas - GESBANK</title>
</head>

<body>
    <div class="container" style="padding-top: 2%;">
        <!-- menu fijo superior -->
        <?php require_once "template/partials/menuAut.php"; ?>
        <br><br>

        <!-- cabecera  -->
        <?php include "views/clientes/partials/header.php" ?>

        <!-- Menu principal -->
        <?php require_once "views/clientes/partials/menu.php" ?>

        <table class="table">
            <thead>
                <tr>

                    <th>Id </th>
                    <th>Numero de cuenta</th>
                    <th>Cliente</th>
                    <th>Fecha Alta</th>
                    <th>Fecha ultimo movimiento</th>
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
                            <!-- botón  eliminar -->
                            <a href="<?= URL ?>cuentas/delete/<?= $cuenta->id ?>" title="Eliminar" onclick="return confirm('Confirmar eliminación del Cliente')" <?= (!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['delete'])) ?
                                                                                                                                                                        'class="btn disabled"' : null ?>>
                                <i class="bi bi-trash-fill"></i></a>

                            <!-- botón  editar -->
                            <a href="<?= URL ?>cuentas/editar/<?= $cuenta->id ?>" title="Editar" <?= (!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['editar'])) ?
                                                                                                        'class="btn disabled"' : null ?>>
                                <i class="bi bi-pencil-square"></i></a>

                            <!-- botón  mostrar -->
                            <a href="<?= URL ?>cuentas/mostrar/<?= $cuenta->id ?> ?>" title="Mostrar" <?= (!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['mostrar'])) ?
                                                                                                            'class="btn disabled"' : null ?>>
                                <i class="bi bi-card-text"></i></a>

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