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

        <legend>Tabla de Libros</legend>

        <!-- Menú -->
        <?php include 'views/partials/menu_prin.php' ?>


        <table class="table table-warning">
            <thead>
                <tr>
                    <?php
                    $claves = array_keys($libros[0]);
                    foreach ($claves as $clave) : ?>
                        <th><?= $clave ?></th>
                    <?php endforeach; ?>
                    <th>acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($libros as $libro) : ?>
                    <tr>
                        <?php foreach ($libro as $dato) : ?>
                            <td><?= $dato ?></td>
                        <?php endforeach; ?>
                        <td>
                            <a href="eliminar.php?id=<?= $libro['id'] ?>" title="Eliminar">
                                <i class="bi bi-trash-fill"></i>
                                <a href="editar.php?id=<?= $libro['id'] ?>" title="Editar">
                                    <i class="bi bi-pencil-fill"></i>
                                    <a href="mostrar.php?id=<?= $libro['id'] ?>" title="Mostrar">
                                        <i class="bi bi-book"></i>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6">Nº Libros: <?= sizeof($libros); ?></td>
                </tr>
            </tfoot>
        </table>

        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>