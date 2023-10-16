<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/head.html' ?>
    <!-- Incluir head -->
    <title>Libros</title>
</head>

<body>
    <!-- Capa principal -->
    <div class="container" style="margin-bottom: 35px;">

        <!-- cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <h2>
                Libros<span class="fs-6"></span>
            </h2>
        </header>


        <table class="table table-striped table-dark">
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
        </table>

        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>