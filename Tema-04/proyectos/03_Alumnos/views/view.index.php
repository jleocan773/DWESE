<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/head.html' ?>
    <title>Proyecto 4.3 - Gestión Alumnos</title>
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
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Fecha Nacimiento</th>
                    <th>Edad</th>
                    <th>Curso</th>
                    <th>Asignaturas</th>
                </tr>
            </thead>
            <!-- Mostramos cuerpo de la tabla -->
            <tbody>

                <?php foreach ($alumnos->tabla as $indice => $alumno) : ?>
                    <tr>
                        <!-- Formatos distintos para cada  columna -->

                        <!-- Detalles de alumnos -->
                        <td><?= $alumno->id ?></td>
                        <td><?= $alumno->nombre ?></td>
                        <td><?= $alumno->apellidos ?></td>
                        <td><?= $alumno->email ?></td>
                        <td><?= $alumno->fecha_nacimiento ?></td>
                        <td><?= $alumno->getEdad() ?></td>
                        <td><?= $cursos[$alumno->curso] ?></td>
                        <td><?= implode('<br>', ArrayAlumnos::mostrarAsignaturas($asignaturas, $alumno->asignaturas)) ?></td>


                        <!-- botones de acción -->
                        <td>
                            <!-- botón  eliminar -->
                            <a href="eliminar.php?indice=<?= $indice ?>" title="Eliminar">
                                <i class="bi bi-trash-fill"></i></a>

                            <!-- botón  editar -->
                            <a href="editar.php?indice=<?= $indice ?>" title="Editar">
                                <i class="bi bi-pencil-square"></i></a>

                            <!-- botón  mostrar -->
                            <a href="mostrar.php?indice=<?= $indice ?>" title="Mostrar">
                                <i class="bi bi-card-text"></i></a>

                        </td>
                    </tr>

                <?php endforeach; ?>


            </tbody>
            <tfoot>
                <tr>
                    <td colspan="8">Nº Alumnos: <?= count($alumnos->tabla) ?></td>
                </tr>
            </tfoot>

        </table>
    </div>

    <!-- Pié del documento -->
    <?php include 'views/partials/footer.html' ?>


    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>

</body>

</html>