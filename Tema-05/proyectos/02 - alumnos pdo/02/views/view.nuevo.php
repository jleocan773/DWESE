<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/head.html' ?>
    <title>Proyecto 5.2 - Alumnos PDO</title>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- Cabecera documento -->
        <?php include 'views/partials/header.php' ?>

        <legend>Formulario Nuevo Alumno</legend>

        <!-- Formulario Nuevo Artículo -->
        <form action="create.php" method="POST">

            <!-- Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre">
            </div>

            <!-- Apellidos -->
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos">
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email">
            </div>

            <!-- Telefono -->
            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono</label>
                <input type="text" class="form-control" name="telefono">
            </div>

            <!-- Dirección -->
            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" name="direccion">
            </div>

            <!-- Población -->
            <div class="mb-3">
                <label for="poblacion" class="form-label">Población</label>
                <input type="text" class="form-control" name="poblacion">
            </div>

            <!-- Provincia -->
            <div class="mb-3">
                <label for="provincia" class="form-label">Provincia</label>
                <input type="text" class="form-control" name="provincia">
            </div>

            <!-- Nacionalidad -->
            <div class="mb-3">
                <label for="nacionalidad" class="form-label">Nacionalidad</label>
                <input type="text" class="form-control" name="nacionalidad">
            </div>

            <!-- DNI -->
            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni">
            </div>

            <!-- Fecha Nacimiento -->
            <div class="mb-3">
                <label for="fechaNac" class="form-label">Fecha Nacimiento YYYY/MM/DD</label>
                <input type="text" class="form-control" name="fechaNac">
            </div>

            <!-- Curso Select -->
            <div class="mb-3">
                <label for="id_curso" class="form-label">Curso</label>
                <select class="form-select" aria-label="Default select example" name="id_curso">
                    <option selected disabled>Seleccione Curso</option>
                    <?php foreach ($cursos as $data) : ?>
                        <option value="<?= $data->id ?>">
                            <?= $data->curso ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- botones de acción -->
            <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
            <button type="reset" class="btn btn-danger">Borrar</button>
            <button type="submit" class="btn btn-primary" href="index.php">Enviar</button>

        </form>

        <br>
        <br>
    </div>

    <!-- Pié del documento -->
    <?php include 'views/partials/footer.html' ?>


    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>