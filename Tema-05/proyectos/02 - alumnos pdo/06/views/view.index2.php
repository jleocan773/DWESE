<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/head.html' ?>
    <title>Home Proyecto 5.2 - Alumnos PDO</title>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- cabecera documento -->
        <?php include 'views/partials/header.php' ?>

        <legend>Tabla Alumnos</legend>

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
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Población</th>
                    <th>DNI</th>
                    <th>Edad</th>
                    <th>Curso</th>
                </tr>
            </thead>
            <!-- Mostramos cuerpo de la tabla -->
            <tbody>
                <?php while ($alumno = $alumnos->fetch()) : ?>
                    <tr>
                        <!-- Mostrar datos de alumnos -->
                        <td><?= $alumno->id ?></td>
                        <td><?= $alumno->nombre ?></td>
                        <td><?= $alumno->email ?></td>
                        <td><?= $alumno->telefono ?></td>
                        <td><?= $alumno->poblacion ?></td>
                        <td><?= $alumno->dni ?></td>
                        <td><?= $alumno->edad ?></td>
                        <td><?= $alumno->curso ?></td>

                        <!-- botones de acción -->
                        <td>
                            <!-- botón  eliminar -->
                            <a href="eliminar.php?indice=<?= $alumno->id ?>" title="Eliminar">
                                <i class="bi bi-trash-fill"></i></a>

                            <!-- botón  editar -->
                            <a href="editar.php?indice=<?= $alumno->id ?>" title="Editar">
                                <i class="bi bi-pencil-square"></i></a>

                            <!-- botón  mostrar -->
                            <a href="mostrar.php?indice=<?= $alumno->id ?>" title="Mostrar">
                                <i class="bi bi-card-text"></i></a>
                        </td>

                    </tr>
                <?php endwhile; ?>

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="8">Nº Alumnos: <?= $alumnos->rowCount() ?></td>
                </tr>
            </tfoot>
        </table>
        
        <!-- Cerramos la conexión -->
        <?php $alumnos = null; 
        $conexion->cerrar_conexion();
        ?>

        <!-- Pié del documento -->
        <?php include 'views/partials/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>