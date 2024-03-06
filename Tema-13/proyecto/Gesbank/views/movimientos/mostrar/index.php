<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once("template/partials/head.php");  ?>
    <title>Mostrar Movimiento - GESBANK</title>
</head>

<body>
    <!-- menú principal superior -->
    <?php require_once "template/partials/menuAut.php"; ?>
    <br><br><br>

    <!-- capa principal -->
    <div class="container">

        <!-- cabecera o título -->
        <?php include "views/movimientos/partials/header.php" ?>

        <!-- formulario solo lectura -->
        <form>
            <!-- Cuenta del Movimiento  -->
            <div class="mb-3">
                <label for="cuenta" class="form-label">Cuenta del Movimiento</label>
                <input type="text" class="form-control" name="cuenta" value="<?= $this->movimiento->cuenta ?>" disabled>
            </div>

            <!-- Fecha Hora del Movimiento -->
            <div class="mb-3">
                <label for="" class="form-label">Fecha Hora del Movimiento</label>
                <input type="datetime-local" class="form-control" name="fecha_hora" value="<?= $this->movimiento->fecha_hora ?>" disabled>
            </div>

            <!-- Concepto -->
            <div class="mb-3">
                <label for="concepto" class="form-label">Concepto</label>
                <input type="text" class="form-control" name="concepto" value="<?= $this->movimiento->concepto ?>" disabled>
            </div>

            <!-- Tipo de Movimiento -->
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo de Movimiento:</label>
                <input type="text" class="form-control" name="tipo" value="<?= ($this->movimiento->tipo == 'I') ? 'Ingreso' : 'Reintegro' ?>" disabled>
            </div>

            <!-- Cantidad -->
            <div class="mb-3">
                <label for="" class="form-label">Cantidad</label>
                <input type="number" class="form-control" name="cantidad" value="<?= $this->movimiento->cantidad ?>" step="0.01" disabled>
            </div>

            <!-- Saldo -->
            <div class="mb-3">
                <label for="" class="form-label">Saldo</label>
                <input type="text" class="form-control" name="saldo" value="<?= $this->movimiento->saldo ?>" disabled>
            </div>

            <!-- Botón Volver -->
            <div class="mb-3">
                <a name="" id="" class="btn btn-secondary" href="<?= URL ?>movimientos" role="button">Volver</a>
            </div>

        </form>
    </div>

    <br><br><br>

    <!-- footer -->
    <?php require_once "template/partials/footer.php" ?>


    <!-- Bootstrap JS y popper -->
    <?php require_once "template/partials/javascript.php" ?>
</body>

</html>