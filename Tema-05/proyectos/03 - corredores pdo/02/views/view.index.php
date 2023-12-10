<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/head.html' ?>
    <title>Home Proyecto 5.2 - corredors PDO</title>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- cabecera documento -->
        <?php include 'views/partials/header.php' ?>

        <legend>Tabla corredors</legend>

        <!-- Menu Principal -->
        <?php include 'views/partials/menu_prin.php' ?>

        <!-- Notificación -->
        <br>
        <?php include 'views/partials/notificacion.php' ?>
        <br>

        <!-- Muestra datos de la tabla -->
        <table class="table">
            <!-- Encabezado tabla -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Ciudad</th>
                    <th>Fecha Nacimiento</th>
                    <th>Sexo</th>
                    <th>Email</th>
                    <th>DNI</th>
                    <th>Edad</th>
                    <th>Categoría</th>
                    <th>Club</th>
                </tr>
            </thead>
            <!-- Mostramos cuerpo de la tabla -->
            <tbody>
                <?php while ($corredor = $corredores->fetch()) : ?>
                    <tr>
                        <!-- Mostrar datos del corredor actual -->
                        <td><?= $corredor->id ?></td>
                        <td><?= $corredor->nombre ?></td>
                        <td><?= $corredor->ciudad ?></td>
                        <td><?= $corredor->fechaNacimiento ?></td>
                        <td><?= $corredor->sexo ?></td>
                        <td><?= $corredor->email ?></td>
                        <td><?= $corredor->dni ?></td>
                        <td><?= $corredor->edad ?></td>
                        <td><?= $corredor->categoria ?></td>
                        <td><?= $corredor->club ?></td>

                        <!-- botones de acción -->
                        <td>
                            <!-- botón  eliminar -->
                            <a href="eliminar.php?id=<?= $corredor->id ?>" title="Eliminar">
                                <i class="bi bi-trash-fill"></i></a>

                            <!-- botón  editar -->
                            <a href="editar.php?id=<?= $corredor->id ?>" title="Editar">
                                <i class="bi bi-pencil-square"></i></a>

                            <!-- botón  mostrar -->
                            <a href="mostrar.php?id=<?= $corredor->id ?>" title="Mostrar">
                                <i class="bi bi-card-text"></i></a>

                        </td>

                    </tr>
                <?php endwhile; ?>

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="8">Nº corredors: <?= $corredores->rowCount() ?></td>
                </tr>
            </tfoot>
        </table>

        <!-- Cerramos la conexión -->
        <?php $corredors = null;
        $conexion->cerrar_conexion();
        ?>

        <br>

        <!-- Pié del documento -->
        <?php include 'views/partials/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>