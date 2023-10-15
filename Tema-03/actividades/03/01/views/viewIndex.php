<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/head.html' ?>
    <!-- Incluir head -->
    <title>Números del 1 al 100</title>
</head>

<body>
    <!-- Capa principal -->
    <div class="container" style="margin-bottom: 35px;">

        <header class="pb-3 mb-4 border-bottom">
            <h2>
                <i class="bi bi-123"></i> Números del 1 al 100<span class="fs-6"></span>
            </h2>
        </header>

        <!-- Tabla While-->
        <?php include 'models/modelTablaWhile.php' ?>
        <legend>Bucle While para Mostrar números del 1 al 100</legend>
        <div class="content">
            <table class="table table-info">
                <?php foreach ($numeros as $columnas) : ?>
                    <tr>
                        <?php foreach ($columnas as $numero) : ?>
                            <td><?= $numero ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>



        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>