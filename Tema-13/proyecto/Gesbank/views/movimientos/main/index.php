<!DOCTYPE html>
<html lang="es">

<head>
    <!-- head -->
    <?php require_once("template/partials/head.php");  ?>
    <title>Movimientos - Gesbank</title>
</head>

<body>
    <div class="container" style="padding-top: 2%;">
        <!-- menu fijo superior -->
        <?php require_once "template/partials/menuAut.php"; ?>
        <br><br>

        <!-- cabecera  -->
        <?php include "views/movimientos/partials/header.php" ?>

        <!-- Mensaje de Error -->
        <?php include 'template/partials/mensaje.php' ?>

        <!-- Menu principal -->
        <?php require_once "views/movimientos/partials/menu.php" ?>

        <!-- tabla movimientos -->
        <table class="table">
            <thead>
                <tr>
                    <th>Id </th>
                    <th>Nº Cuenta</th>
                    <th>Fecha Hora</th>
                    <th>Concepto</th>
                    <th>Tipo</th>
                    <th class="text-end">Cantidad</th>
                    <th class="text-end">Saldo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->movimientos as $movimiento) : ?>
                    <tr>
                        <td><?= $movimiento->id ?></td>
                        <td><?= $movimiento->cuenta ?></td>
                        <td><?= $movimiento->fecha_hora ?></td>
                        <td><?= $movimiento->concepto ?></td>
                        <td><?= $movimiento->tipo ?></td>
                        <td class="text-end"><?= number_format($movimiento->cantidad, 0, ',', '.') ?></td>
                        <td class="text-end"><?= number_format($movimiento->saldo, 2, ',', '.') ?> €</td>

                        <!-- botones de acción -->
                        <td>
                            <!-- botón mostrar -->
                            <a href="<?= URL ?>movimientos/mostrar/<?= $movimiento->id ?>" title="Mostrar" class="btn btn-warning <?= (!in_array($_SESSION['id_rol'], $GLOBALS['movimientos']['mostrar'])) ? 'disabled' : '' ?>">
                                <i class="bi bi-card-text"></i>
                            </a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="8">Nº Registros: <?= $this->movimientos->rowCount() ?> </td>
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