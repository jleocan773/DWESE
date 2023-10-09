<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/head.html' ?>
    <!-- Incluir head -->
    <title>Resultado Todas Operaciones</title>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-calculator"></i>Resultados de Todas Las Operaciones
            <span class="fs-6"></span>
        </header>

        <legend>Resultados de Todas las Operaciones</legend>
        <table class="table">
            <tbody>
                <tr>
                    <th>DECIMAL</th>
                    <td><?= $valorDecimal ?></td>
                </tr>
                <tr>
                    <th>BINARIO</th>
                    <td><?= $valorBinario ?></td>
                </tr>
                <th>HEXADECIMAL</th>
                <td><?= $valorHexadecimal ?></td>
                </tr>
                <th>OCTAL</th>
                <td><?= $valorOctal ?></td>
                </tr>
            </tbody>
        </table>

        <div class="btn-group" role="group">
            <a class="btn btn-primary" href="index.php" role="button">Volver</a>
        </div>


        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>