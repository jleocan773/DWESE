<!DOCTYPE html>
<html lang="es">

<head>
    <!-- bootstrap  -->
    <?php require_once("template/partials/head.php");  ?>
    <title>Nuevo Movimiento - Gesbank</title>
</head>

<body>

    <body>
        <!-- menu fijo superior -->
        <?php require_once "template/partials/menuAut.php"; ?>
        <br><br><br>


        <!-- capa principal -->
        <div class="container">

            <!-- cabecera -->
            <?php include "views/movimientos/partials/header.php" ?>

            <legend>Formulario Nuevo Movimiento</legend>

            <!-- Mensaje de Error -->
            <?php include 'template/partials/error.php' ?>

            <!-- Formulario -->
            <form action="<?= URL ?>movimientos/create" method="POST">

                <!-- Cuenta del Movimiento  -->
                <div class="mb-3">
                    <label for="cuenta" class="form-label">Cuenta del Movimiento</label>
                    <select class="form-select <?= (isset($this->errores['cuenta'])) ? 'is-invalid' : null ?>" name="cuenta" id="cuenta">
                        <option selected disabled>Seleccione un cliente</option>
                        <?php foreach ($this->cuentas as  $cuenta) : ?>
                            <option value="<?= $cuenta->id ?>"  <?= ($cuenta->id == $this->movimiento->id_cuenta) ? 'selected' : null ?>>
                                <?= $cuenta->num_cuenta ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>


                <!-- Fecha Hora del Movimiento -->
                <div class="mb-3">
                    <label for="" class="form-label">Fecha Hora del Movimiento</label>
                    <input type="datetime-local" class="form-control <?= (isset($this->errores['fecha_hora'])) ? 'is-invalid' : null ?>" name="fecha_hora" id="fecha_hora" value="<?php echo date('Y-m-d\TH:i:s'); ?>">

                    <!-- Mostrar posible error -->
                    <?php if (isset($this->errores['fecha_hora'])) : ?>
                        <span class="form-text text-danger" role="alert">
                            <?= $this->errores['fecha_hora'] ?>
                        </span>
                    <?php endif; ?>
                </div>

                <!-- Concepto -->
                <div class="mb-3">
                    <label for="concepto" class="form-label">Concepto</label>
                    <input type="text" class="form-control <?= (isset($this->errores['concepto'])) ? 'is-invalid' : null ?>" name="concepto" id="concepto" value="<?= $this->movimiento->concepto ?>">

                    <!-- Mostrar posible error -->
                    <?php if (isset($this->errores['concepto'])) : ?>
                        <span class="form-text text-danger" role="alert">
                            <?= $this->errores['concepto'] ?>
                        </span>
                    <?php endif; ?>
                </div>

                <!-- Tipo de Movimiento -->
                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo de Movimiento:</label>
                    <select class="form-select <?= (isset($this->errores['tipo'])) ? 'is-invalid' : null ?>" name="tipo" id="tipo">
                        <option selected disabled>Seleccione un tipo de movimiento</option>
                        <option value="I" <?= ($this->movimiento->tipo == 'I') ? 'selected' : null ?>>Ingreso</option>
                        <option value="R" <?= ($this->movimiento->tipo == 'R') ? 'selected' : null ?>>Reintegro</option>
                    </select>
                </div>

                <!-- Cantidad -->
                <div class="mb-3">
                    <label for="" class="form-label">Cantidad</label>
                    <input type="number" class="form-control <?= (isset($this->errores['cantidad'])) ? 'is-invalid' : null ?>" name="cantidad" id="cantidad" value="<?= $this->movimiento->cantidad ?>" step="0.01">

                    <!-- Mostrar posible error -->
                    <?php if (isset($this->errores['cantidad'])) : ?>
                        <span class="form-text text-danger" role="alert">
                            <?= $this->errores['cantidad'] ?>
                        </span>
                    <?php endif; ?>
                </div>

                <!-- Botones de acción -->
                <div class="mb-3">
                    <a name="" id="" class="btn btn-secondary" href="<?= URL ?>movimientos" role="button">Cancelar</a>
                    <button type="button" class="btn btn-danger">Borrar</button>
                    <button type="submit" class="btn btn-primary">Crear</button>
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