<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'layouts/head.html' ?>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- Cabecera documento -->
        <?php include 'partials/header.php' ?>

        <legend>Formulario Mostrar Alumno</legend>

        <!-- Menú -->
        <?php include 'partials/menu_prin.php' ?>


        <!-- Formulario Editar Alumno -->
        <form>

            <!-- ID -->
            <div class="mb-3">
                <label class="form-label">ID</label>
                <input type="number" class="form-control" name="id" value="<?= $alumno->id; ?>" readonly>
            </div>

            <!-- Nombre -->
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= $alumno->nombre; ?>" readonly>
            </div>

            <!-- Apellidos -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" value="<?= $alumno->apellidos; ?>" readonly>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" value="<?= $alumno->email; ?>" readonly>
            </div>

            <!-- Fecha Nacimiento -->
            <div class="mb-3">
                <label for="fecha_nacimiento" class="form-label">Fecha Nacimiento MM/DD/YYYY</label>
                <input type="text" class="form-control" name="fecha_nacimiento" value="<?= $alumno->fecha_nacimiento; ?>" readonly>
            </div>

            <!-- Curso Select -->
            <div class="mb-3">
                <label class="form-label">Curso</label>
                <select class="form-select" aria-label="Default select example" name="curso" disabled>
                    <?php foreach ($cursos as $key => $curso) : ?>
                        <option value="<?= $key ?>" <?= ($alumno->curso == $key) ? 'selected' : null ?>>
                            <?= $curso ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Asignaturas Checkbox -->
            <div class="mb-3">
                <label class="form-label">Seleccionar Asignaturas</label>
                <div class="form-control">
                    <?php foreach ($asignaturas as $indice => $asignatura) : ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="<?= $indice ?>" name="asignaturas[]" <?= (in_array($indice, $alumno->asignaturas) ? 'checked' : null) ?> disabled>
                            <label class="form-check-label" for="">
                                <?= $asignatura ?>
                                <label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>


            <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar</button>

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