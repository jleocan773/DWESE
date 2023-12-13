<!DOCTYPE html>
<html lang="es">

<head>
    <!-- layout.head -->
    <?php include 'views/layouts/layout.head.html' ?>

    <title>Gestión libros - Home </title>
</head>

<body>
    <!-- Capa Principal -->
    <div class="container">

        <!-- partial.header -->
        <?php include 'views/partials/partial.header.php' ?>

        <!-- partial.menu -->
        <?php include 'views/partials/partial.menu.php' ?>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <!-- Mostramos el encabezado de la tabla -->
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Editorial</th>
                        <th class="text-end">Unidades</th>
                        <th class="text-end">Coste</th>
                        <th class="text-end">PVP</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Mostramos cuerpo de la tabla -->
                    <!-- En el foreach incluyo un objeto de la clase pdostatement -->
                    <?php while ($libro = $libros->fetch()) : ?>
                        <tr>
                            <!-- Mostrar datos del libro actual -->
                            <td><?= $libro->id ?></td>
                            <td><?= $libro->titulo ?></td>
                            <td><?= $libro->autor ?></td>
                            <td><?= $libro->editorial ?></td>
                            <td class="text-end"><?= $libro->unidades ?></td>
                            <td class="text-end"><?= number_format($libro->coste, 2, ',', '.') ?> €</td>
                            <td class="text-end"><?= number_format($libro->pvp, 2, ',', '.') ?> €</td>


                            <!-- Columna de acciones -->
                            <td>
                                <a href="" title="Eliminar"><i class="bi bi-trash-fill" onclick="return confirm('Confimar elimación del libro')"></i></a>
                                <a href="" title="Editar"><i class="bi bi-pencil-fill"></i></a>
                                <a href="" title="Mostrar"><i class="bi bi-eye-fill"></i></a>
                            </td>
                        </tr>
                    <?php endwhile ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6">Nº Libros: <?= $libros->rowCount() ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <br><br><br>

    <!-- partial.footer -->
    <?php include 'views/partials/partial.footer.html' ?>

    <!-- layout.javascript -->
    <?php include("layouts/layout.javascript.html"); ?>


</body>

</html>