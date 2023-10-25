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



        <legend>Tabla de Artículos</legend>

        <!-- Menú -->
        <?php include 'views/partials/menu.php' ?>

        <table class="table table-info">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descripción</th>
                    <th>Modelo</th>
                    <th>Categoría</th>
                    <th class="text-end">Stock</th>
                    <th class="text-end">Precio</th>
                    <th>acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articulos as $articulo) : ?>
                    <tr>
                        <td><?= $articulo['id'] ?></td>
                        <td><?= $articulo['descripcion'] ?></td>
                        <td><?= $articulo['modelo'] ?></td>
                        <td><?= $categorias[$articulo['categoria']] ?></td>
                        <td class="text-end"><?= $articulo['unidades'] ?></td>
                        <td class="text-end"><?= number_format($articulo['precio'], 2, ',', '.') ?> €</td>
                        <td> <!-- Columna "Acciones" -->
                            <a href="eliminar.php?id=<?= $articulo['id'] ?>" title="Eliminar">
                                <i class="bi bi-trash-fill"></i>
                            </a>
                            <a href="editar.php?id=<?= $articulo['id'] ?>" title="Editar">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <a href="mostrar.php?id=<?= $articulo['id'] ?>" title="Mostrar">
                                <i class="bi bi-book"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7">Nº Articulos: <?= sizeof($articulos); ?></td>
                </tr>
            </tfoot>
        </table>

        <!-- Pié del documento -->
        <?php include 'views/partials/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>