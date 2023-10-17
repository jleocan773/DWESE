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
        <table class="table table-warning">
            <thead>
                <tr>
                    <?php
                    $claves = array_keys($libros[0]);
                    foreach ($claves as $clave) : ?>
                        <th><?= $clave ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($libros as $libro) : ?>
                    <tr>
                        <?php foreach ($libro as $dato) : ?>
                            <td><?= $dato ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">Nº Libros: <?= sizeof($libros);?></td>
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