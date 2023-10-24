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
            Gestión Artículos<span class="fs-6"></span>
            </h2>
        </header>


        <legend>Tabla de Artículos</legend>
        <table class="table table-info">
            <thead>
                <tr>
                    <?php
                    $claves = array_keys($articulos[0]);
                    foreach ($claves as $clave) : ?>
                        <th><?= $clave ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articulos as $articulo) : ?>
                    <tr>
                        <?php foreach ($articulo as $dato) : ?>
                            <td><?= $dato ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6">Nº Articulos: <?= sizeof($articulos);?></td>
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