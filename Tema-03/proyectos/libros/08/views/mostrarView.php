<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/head.html' ?>
    <!-- Incluir head -->
    <title>Gestión Libros</title>
</head>

<body>
    <!-- Capa principal -->
    <div class="container" style="margin-bottom: 35px;">

        <!-- Cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <h2>
                Gestión Libros<span class="fs-6"></span>
            </h2>
        </header>

        <legend>Mostrar Libros</legend>

        <!-- Formulario -->
        <form>
            <div class="mb-3">
                <label class="form-label">ID</label>
                <input type="text" name="id" class="form-control" value="<?= $libro['id'] ?>" readonly />
            </div>
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input type="text" name="titulo" class="form-control" value="<?= $libro['titulo'] ?>" readonly />
            </div>
            <div class="mb-3">
                <label class="form-label">Autor</label>
                <input type="text" name="autor" class="form-control" value="<?= $libro['autor'] ?>" readonly />
            </div>
            <div class="mb-3">
                <label class="form-label">Género</label>
                <input type="text" name="genero" class="form-control" value="<?= $libro['genero'] ?>" readonly />
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input type="text" name="precio" class="form-control" value="<?= $libro['precio'] ?>" readonly />
            </div>

            <!-- Botones de Acción -->
            <!--- Para asignarles acciones a los botones usamos el formaction-->

            <!-- Este botón tiene que ir al Index -->
            <a class="btn btn-primary" href="index.php" role="button">Volver</a>
        </form>

        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>