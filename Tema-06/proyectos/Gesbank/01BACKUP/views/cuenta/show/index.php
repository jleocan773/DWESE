<!DOCTYPE html>
<html lang="es">

<!-- Head -->

<head>
    <?php require_once("template/partials/head.php") ?>
    <title><?= $this->title ?></title>
</head>

<body>
    <!-- Menú Proyecto -->
    <?php require_once("template/partials/menu.php") ?>
    <br><br><br>

    <!-- Capa principal -->
    <div class="container">

        <!-- Cabecera documento -->
        <?php require_once("views/cliente/partials/header.php") ?>

        <legend>Formulario Nuevo Cliente</legend>

        <!-- Formulario Nuevo Cliente -->
        <form>

            <!-- Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= $this->cliente->nombre ?>" disabled>
            </div>

            <!-- Apellidos -->
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" value="<?= $this->cliente->apellidos ?>" disabled>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electronico</label>
                <input type="email" class="form-control" name="email" value="<?= $this->cliente->email ?>" disabled>
            </div>

            <!-- Telefono -->
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="number" class="form-control" name="telefono" value="<?= $this->cliente->telefono ?>" disabled>
            </div>

            <!-- Ciudad -->
            <div class="mb-3">
                <label for="ciudad" lass="form-label">Ciudad</label>
                <input type="text" class="form-control" name="ciudad" value="<?= $this->cliente->ciudad ?>" disabled>
            </div>

            <!-- DNI -->
            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni" pattern="[0-9]{8}[A-Z]{1}" value="<?= $this->cliente->dni ?>" disabled>
            </div>

            <div class="mb-3">
                <a class="btn btn-secondary" href="<?= URL ?>cliente" role="button">Volver</a>
            </div>

        </form>
        <br>
        <br>
        <br>
        <!-- Pie de documento -->
        <?php require_once("template/partials/footer.php") ?>

    </div>


    <?php require_once("template/partials/javascript.php") ?>
</body>

</html>