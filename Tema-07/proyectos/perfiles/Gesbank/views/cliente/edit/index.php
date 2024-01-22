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
        <form action="<?= URL ?>cliente/update/<?= $this->id ?>" method="POST">

            <!-- Nombre -->
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= $this->cliente->nombre ?>">
            </div>

            <!-- Apellidos -->
            <div class="mb-3">
                <label class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" value="<?= $this->cliente->apellidos ?>">
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Correo Electronico</label>
                <input type="email" class="form-control" name="email" value="<?= $this->cliente->email ?>">
            </div>

            <!-- Telefono -->
            <div class="mb-3">
                <label class="form-label">Télefono</label>
                <input type="number" class="form-control" name="telefono" value="<?= $this->cliente->telefono ?>">
            </div>

            <!-- Ciudad -->
            <div class="mb-3">
                <label class="form-label">Ciudad</label>
                <input type="text" class="form-control" name="ciudad" value="<?= $this->cliente->ciudad ?>">
            </div>

            <!-- DNI -->
            <div class="mb-3">
                <label class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni" pattern="[0-9]{8}[A-Z]{1}" value="<?= $this->cliente->dni ?>">
            </div>

            <div class="mb-3">
                <a class="btn btn-secondary" href="<?= URL ?>cliente" role="button">Cancelar</a>
                <button type="reset" class="btn btn-danger">Borrar</button>
                <button type="submit" class="btn btn-primary">Añadir</button>
            </div>
        </form>
        <br>
        <br>
    </div>
    <br>
    <br>

    <!-- Pié del documento -->
    <?php require_once("template/partials/footer.php") ?>


    <!-- javascript bootstrap 532 -->
    <?php require_once("template/partials/javascript.php") ?>
</body>

</html>