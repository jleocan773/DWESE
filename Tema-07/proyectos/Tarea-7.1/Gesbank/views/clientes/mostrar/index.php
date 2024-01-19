<!DOCTYPE html>
<html lang="es">

<head>
    <!-- bootstrap  -->
    <?php require_once("template/partials/head.php");  ?>
    <title>Editar Cliente - Gesbank</title>
</head>

<body>
    <!-- menú principal fijo superior-->
    <?php require_once "template/partials/menu.php"; ?>
    <!-- capa principal -->
    <div class="container">
        <!-- cabecera -->
        <?php include "views/clientes/partials/header.php" ?>
        <!-- formulario solo lectura -->
        <form>

            <!-- nombre solo lectura -->
            <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= $this->cliente->nombre ?>" disabled>
            </div>
            <!-- apellidos solo lectura -->
            <div class="mb-3">
                <label for="" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" value="<?= $this->cliente->apellidos ?>" disabled>
            </div>
            <!-- ciudad solo lectura -->
            <div class="mb-3">
                <label for="" class="form-label">Ciudad</label>
                <input type="text" class="form-control" name="ciudad" value="<?= $this->cliente->ciudad ?>" disabled>
            </div>
            <!-- email solo lectura -->
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="" value="<?= $this->cliente->email ?>" disabled>
            </div>
            <!-- telefono solo lectura -->
            <div class="mb-3">
                <label for="" class="form-label">Telefono</label>
                <input type="text" class="form-control" name="telefono" id="" value="<?= $this->cliente->telefono ?>" disabled>
            </div>
            <!-- dni solo lectura -->
            <div class="mb-3">
                <label for="" class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni" id="" value="<?= $this->cliente->dni ?>" disabled>
            </div>
            <!-- botones acción -->
            <div class="mb-3">
                <a name="" id="" class="btn btn-secondary" href="<?= URL ?>clientes" role="button">Volver</a>
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