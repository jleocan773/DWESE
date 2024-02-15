<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once("template/partials/head.php");  ?>
    <title>Editar Cuenta - Gesbank</title>

</head>

<body>
    <!-- menu principal fijo superior -->
    <?php require_once "template/partials/menuAut.php"; ?>
    <br><br><br>

    <!-- capa principal -->
    <div class="container">

        <!-- cabecera o título -->
        <?php include "views/cuentas/partials/header.php" ?>

        <legend>Formulario Editar Cuenta</legend>


        <form action="<?= URL ?>cuentas/update/<?= $this->id ?>" method="POST">

            <!-- Número de cuenta -->
            <div class="mb-3">
                <label for="" class="form-label">Numero de cuenta</label>
                <input type="text" class="form-control <?= (isset($this->errores['num_cuenta'])) ? 'is-invalid' : null ?>" name="num_cuenta" value="<?= $this->cuenta->num_cuenta ?>">


                <!-- Mostrar posible error -->
                <?php if (isset($this->errores['num_cuenta'])) : ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['num_cuenta'] ?>
                    </span>
                <?php endif; ?>
            </div>

            <!-- Cliente -->
            <div class="mb-3">
                <label for="" class="form-label">Cliente</label>
                <select class="form-select <?= (isset($this->errores['id_cliente'])) ? 'is-invalid' : null ?>" name="id_cliente" id="">
                    <option selected disabled>Seleccione un cliente </option>
                    <?php foreach ($this->clientes as  $cliente) : ?>
                        <div class="form-check">
                            <option value="<?= $cliente->id ?>" <?= ($this->cuenta->id_cliente == $cliente->id) ? "selected" : null; ?>>
                                <?= $cliente->cliente ?>
                            </option>
                        </div>
                    <?php endforeach; ?>
                </select>

                <!-- Mostrar posible error -->
                <?php if (isset($this->errores['id_cliente'])) : ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['id_cliente'] ?>
                    </span>
                <?php endif; ?>
            </div>

            <!-- Fecha -->
            <div class="mb-3">
                <label for="" class="form-label">Fecha alta</label>
                <input type="datetime-local" class="form-control <?= (isset($this->errores['fecha_alta'])) ? 'is-invalid' : null ?>" name="fecha_alta" value="<?= $this->cuenta->fecha_alta ?>">

                <!-- Mostrar posible error -->
                <?php if (isset($this->errores['fecha_alta'])) : ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['fecha_alta'] ?>
                    </span>
                <?php endif; ?>
            </div>

            <!-- Fecha ultimo movimiento -->
            <div class="mb-3">
                <label for="" class="form-label">Fecha Último Movimiento</label>
                <input type="datetime-local" class="form-control <?= (isset($this->errores['fecha_ul_mov'])) ? 'is-invalid' : null ?>" name="fecha_ul_mov" value="<?= $this->cuenta->fecha_ul_mov ?>" disabled>

                <?php if (isset($this->errores['fecha_ul_mov'])) : ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['fecha_ul_mov'] ?>
                    </span>
                <?php endif; ?>
            </div>

            <!-- Número de movimientos -->
            <div class="mb-3">
                <label for="" class="form-label">Número de Movimientos</label>
                <input type="number" class="form-control <?= (isset($this->errores['num_movtos'])) ? 'is-invalid' : null ?>" name="num_movtos" id="" value="<?= $this->cuenta->num_movtos ?>" disabled>
            </div>

            <!-- Saldo  -->
            <div class="mb-3">
                <label for="" class="form-label">Saldo</label>
                <input type="number" class="form-control <?= (isset($this->errores['saldo'])) ? 'is-invalid' : null ?>" name="saldo" id="" step="0.01" value="<?= $this->cuenta->saldo ?>">

                <?php if (isset($this->errores['saldo'])) : ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['saldo'] ?>
                    </span>
                <?php endif; ?>
            </div>

            <!-- Botones de acción -->
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