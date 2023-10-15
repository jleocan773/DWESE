<!DOCTYPE html>
<html lang="es">
<head>
    <?php include 'views/layouts/head.html' ?>
    <!-- Incluir head -->
    <title>Tabla de Números</title>
</head>
<body>
    <!-- Capa principal -->
    <div class="container" style="margin-bottom: 35px;">

        <!-- cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <h2>
                <i class="bi bi-123"></i> Tabla de Números<span class="fs-6"></span>
            </h2>
        </header>

       
        <!-- Tabla For-->
		<?php include 'models/modelTablaFor.php' ?>
		<legend>Bucle For Tabla Multiplicar</legend>
        <div class="content">
            <table class="table table-warning">
                <tr>
                    <td></td>
                    <?php for ($i = 1; $i <= 10; $i++): ?>
                        <th><?= $i ?></th>
                    <?php endfor; ?>
                </tr>
                <?php for ($i = 1; $i <= 10; $i++): ?>
                    <tr>
                        <th><?= $i ?></th>
                        <?php for ($j = 1; $j <= 10; $j++): ?>
                            <td><?= $i * $j ?></td>
                        <?php endfor; ?>
                    </tr>
                <?php endfor; ?>
            </table>
        </div>

        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>
</html>
