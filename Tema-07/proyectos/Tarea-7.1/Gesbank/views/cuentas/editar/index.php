<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once("template/partials/head.php");  ?>
    <title>Editar Cuenta - GESBANK</title>

</head>

<body>
    <!-- menu principal fijo superior -->
    <?php require_once "template/partials/menu.php"; ?>
    <!-- capa principal -->
    <div class="container">
        <!-- cabecera o título -->
        <?php include "views/clientes/partials/header.php" ?>

        <form action="<?= URL ?>cuentas/update/<?= $this->id ?>" method="POST">

            <!-- Número de cuenta -->
            <div class="mb-3">
                <label for="" class="form-label">Numero de cuenta</label>
                <input type="text" class="form-control" name="num_cuenta" value="<?= $this->cuenta->num_cuenta ?>" readonly>
            </div>
            <!-- Cliente -->
            <div class="mb-3">
                <label for="" class="form-label">Cliente</label>
                <select class="form-select" name="id_cliente" id="">
                    <option selected disabled>Seleccione un cliente </option>
                    <?php foreach ($this->clientes as  $cliente) : ?>
                        <div class="form-check">
                            <option value="<?= $cliente->id ?>" <?= ($this->cuenta->id_cliente == $cliente->id) ? "selected" : null; ?>>
                                <?= $cliente->cliente ?>
                            </option>
                        </div>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- Fecha -->
            <div class="mb-3">
                <label for="" class="form-label">Fecha alta</label>
                <input type="datetime-local" class="form-control" name="fecha_alta" value="<?= $this->cuenta->fecha_alta ?>" >
            </div>
             <!-- Fecha ultimo movimiento -->
             <div class="mb-3">
                <label for="" class="form-label">Fecha último movimiento</label>
                <input type="datetime-local" class="form-control" name="fecha_ul_mov" value="<?= $this->cuenta->fecha_ul_mov ?>">
            </div>
            <!-- Número de movimientos -->
            <div class="mb-3">
                <label for="" class="form-label">Número de Movimientos</label>
                <input type="number" class="form-control" name="num_movtos" id="" value="<?= $this->cuenta->num_movtos ?>" >
            </div>
            <!-- saldo  -->
            <div class="mb-3">
                <label for="" class="form-label">Saldo</label>
                <input type="number" class="form-control" name="saldo" id="" step="0.01" value="<?= $this->cuenta->saldo ?>">
            </div>
            <!-- botones de acción -->
            <div class="mb-3">
                <a name="" id="" class="btn btn-secondary" href="<?= URL ?>cuentas" role="button">Cancelar</a>
                <button type="button" class="btn btn-danger">Borrar</button>
                <button type="submit" class="btn btn-primary">Actualizar</button>

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