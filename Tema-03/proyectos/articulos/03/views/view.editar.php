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
            <header class="pb-3 mb-4 border-bottom">
                <h2>
                    Gestión Artículos<span class="fs-6"></span>
                </h2>
            </header>

            <legend>Editar Artículo</legend>

            <!-- Formulario -->
            <form action="update.php?id=<?= $id ?>" method="POST">
                <div class="mb-3">
                    <label class="form-label">ID</label>
                    <input type="text" name="id" class="form-control" value="<?= $articulo['id'] ?>" readonly />
                </div>
                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <input type="text" name="descripcion" class="form-control" value="<?= $articulo['descripcion'] ?>" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Modelo</label>
                    <input type="text" name="modelo" class="form-control" value="<?= $articulo['modelo'] ?>" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Categoría</label>
                    <select name="categoria" class="form-select">
                        <?php foreach ($categorias as $indice => $categoria) : ?>
                            <option value="<?= $indice ?>" <?php if ($indice == $articulo['categoria']) echo 'selected'; ?>>
                                <?= $categoria ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Unidades</label>
                    <input type="text" name="unidades" class="form-control" value="<?= $articulo['unidades'] ?>" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Precio</label>
                    <input type="text" name="precio" class="form-control" value="<?= $articulo['precio'] ?>" />
                </div>

                <!-- Botones de Acción -->
                <!--- Para asignarles acciones a los botones usamos el formaction-->

                <!-- Este botón tiene que ir al Index -->
                <a class="btn btn-primary" href="index.php" role="button">Volver</a>
                <!-- Este botón borra todo lo escrito -->
                <button type="reset" class="btn btn-danger">Borrar</button>
                <!-- Este botón envía los datos -->
                <button type="submit" class="btn btn-success">Actualizar</button>
            </form>

            <!-- Pié del documento -->
            <?php include 'views/partials/footer.html' ?>

        </div>

        <!-- javascript bootstrap 532 -->
        <?php include 'views/layouts/javascript.html' ?>
    </body>

    </html>