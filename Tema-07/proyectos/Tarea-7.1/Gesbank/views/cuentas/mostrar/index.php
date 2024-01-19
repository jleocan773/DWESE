<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once("template/partials/head.php");  ?>
    <title>Mostrar Cuenta - GESBANK</title>
</head>

<body>
    <!-- menú principal superior -->
    <?php require_once "template/partials/menu.php"; ?>
    <!-- capa principal -->
    <div class="container">
        <!-- cabecera o título -->
        <?php include "views/clientes/partials/header.php" ?>
        <!-- formulario solo lectura -->
        <form>
            <!-- Número de cuenta -->
            <div class="mb-3">
                <label for="" class="form-label">Numero de cuenta</label>
                <input type="text" class="form-control" name="num_cuenta" value="<?= $this->cuenta->num_cuenta ?>" disabled>
            </div>
            <!-- titular o cliente -->
            <div class="mb-3">
                <label for="" class="form-label">Cliente</label>
                <input type="text" class="form-control" value="<?= $this->cliente->apellidos . ', ' . $this->cliente->nombre ?>" disabled>
            </div>
            <!-- fecha alta -->
            <div class="mb-3">
                <label for="" class="form-label">Fecha alta</label>
                <input type="datetime" class="form-control" name="fecha_alta" value="<?= $this->cuenta->fecha_alta ?>" disabled>
            </div>
            <!-- fecha utlimo movimiento -->
            <div class="mb-3">
                <label for="" class="form-label">Fecha último movimiento</label>
                <input type="datetime" class="form-control" name="fecha_ul_mov" value="<?= $this->cuenta->fecha_ul_mov ?>" disabled>
            </div>
            <!-- Número de movimientos -->
            <div class="mb-3">
                <label for="" class="form-label">Número de Movimientos</label>
                <input type="number" class="form-control" name="num_movtos" id="" value="<?= $this->cuenta->num_movtos ?>" disabled>
            </div>
            <div class="mb-3">

                <label for="" class="form-label">Saldo</label>
                <input type="text" class="form-control" name="saldo" id="" value="<?= $this->cuenta->saldo ?>" disabled>
            </div>



            <div class="mb-3">

                <a name="" id="" class="btn btn-secondary" href="<?= URL ?>cuentas" role="button">Volver</a>


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