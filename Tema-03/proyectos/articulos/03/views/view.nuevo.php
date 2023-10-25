<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/head.html' ?>
    <!-- Incluir head -->
    <title>Gestión Artículos</title>
</head>

<body>
    <!-- Capa principal -->
    <div class="container" style="margin-bottom: 35px;">

        <!-- Cabecera documento -->
        <?php include 'views/partials/header.html' ?>


        <legend>Formulario Nuevo</legend>

        <!-- Formulario -->
        <form action="create.php" method="POST">
            <div class="mb-3">
                <label class="form-label">ID</label>
                <input type="number" name="id" class="form-control" />
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <input type="text" name="descripcion" class="form-control" />
            </div>
            <div class="mb-3">
                <label class="form-label">Modelo</label>
                <input type="text" name="modelo" class="form-control" />
            </div>
            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <select name="categoria" class="form-select">
                    <?php foreach ($categorias as $indice => $categoria) : ?>
                        <option value="<?= $indice ?>"><?= $categoria ?></option>;
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Unidades</label>
                <input type="number" name="unidades" class="form-control" />
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input type="number" name="precio" class="form-control" step="0.01" />
            </div>
            <!-- Botones de Acción -->
            <!--- Para asignarles acciones a loss botones usamos el formaction-->

            <!-- Este boton tiene que ir al Index -->
            <a class="btn btn-primary" href="index.php" role="button">Volver</a>
            <!-- Este botón borra todo lo escrito -->
            <button type="reset" class="btn btn-danger">Borrar</button>
            <!-- Este botón envía los datos -->
            <button type="submit" class="btn btn-success">Enviar</button>


        </form>

        <!-- Pié del documento -->
        <?php include 'views/partials/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>