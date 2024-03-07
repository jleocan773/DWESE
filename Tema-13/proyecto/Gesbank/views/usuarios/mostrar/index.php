<!DOCTYPE html>
<html lang="es">

<head>
    <!-- bootstrap  -->
    <?php require_once("template/partials/head.php");  ?>
    <title>Detalles de Usuario - Gesbank</title>
</head>

<body>
    <!-- menu fijo superior -->
    <?php require_once "template/partials/menuAut.php"; ?>
    <br><br><br>

    <!-- capa principal -->
    <div class="container">
        <!-- cabecera -->
        <?php include "views/usuarios/partials/header.php" ?>

        <legend>Detalles del Usuario</legend>

        <!-- Mensaje de Error -->
        <?php include 'template/partials/error.php' ?>

        <!-- Formulario -->
        <form>
            <!-- Nombre -->
            <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input type="text" class="form-control" value="<?= $this->usuario->name ?>" readonly>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" value="<?= $this->usuario->email ?>" readonly>
            </div>

            <!-- Roles -->
            <div class="mb-3">
                <label for="" class="form-label">Rol</label>
                <input type="text" class="form-control" value="<?= $this->rol->name ?>" readonly>
            </div>

            <!-- Botón de volver atrás -->
            <div class="mb-3">
                <a name="" id="" class="btn btn-secondary" href="<?= URL ?>usuarios" role="button">Volver</a>
            </div>
        </form>
    </div>

    <!-- footer -->
    <?php require_once "template/partials/footer.php" ?>

    <!-- Bootstrap JS y popper -->
    <?php require_once "template/partials/javascript.php" ?>
</body>

</html>