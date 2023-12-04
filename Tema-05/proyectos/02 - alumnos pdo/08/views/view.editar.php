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

        <legend>Formulario Editar Alumno</legend>
        
        <!-- Formulario Editar Alumno -->
        <form action="update.php?id=<?= $alumno->id ?>" method="POST">

            <!-- ID -->
            <div class="mb-3">
                <input type="number" class="form-control" name="id" value="<?= $alumno->id; ?>" hidden>
            </div>

            <!-- Nombre -->

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= $alumno->nombre; ?>">
            </div>

            <!-- Apellidos -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" value="<?= $alumno->apellidos; ?>">
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" value="<?= $alumno->email; ?>">
            </div>

            <!-- Teléfono -->
            <div class="mb-3">
                <label class="form-label">Teléfono</label>
                <input type="text" class="form-control" name="telefono" value="<?= $alumno->telefono; ?>">
            </div>

            <!-- Dirección -->
            <div class="mb-3">
                <label for="precio" class="form-label">Dirección </label>
                <input type="text" class="form-control" name="direccion" value="<?= $alumno->direccion; ?>">
            </div>

            <!-- Población -->
            <div class="mb-3">
                <label for="precio" class="form-label">Población </label>
                <input type="text" class="form-control" name="poblacion" value="<?= $alumno->poblacion; ?>">
            </div>

            <!-- Provincia -->
            <div class="mb-3">
                <label for="precio" class="form-label">Provincia </label>
                <input type="text" class="form-control" name="provincia" value="<?= $alumno->provincia; ?>">
            </div>

            <!-- Nacionalidad -->
            <div class="mb-3">
                <label for="precio" class="form-label">Nacionalidad </label>
                <input type="text" class="form-control" name="nacionalidad" value="<?= $alumno->nacionalidad; ?>">
            </div>

            <!-- DNI -->
            <div class="mb-3">
                <label for="precio" class="form-label">DNI </label>
                <input type="text" class="form-control" name="dni" value="<?= $alumno->dni; ?>">
            </div>

            <!-- Fecha de Nacimiento -->
            <div class="mb-3">
                <label for="precio" class="form-label">Fecha de Nacimiento </label>
                <input type="text" class="form-control" name="fechaNac" value="<?= $alumno->fechaNac; ?>">
            </div>

            <!-- Curso -->
            <div class="mb-3">
                <label class="form-label">Curso</label>
                <select class="form-select" aria-label="Default select example" name="id_curso">
                    <?php foreach ($cursos as $curso) : ?>
                        <option value="<?= $curso->id ?>" <?= ($alumno->id_curso == $curso->id) ? 'selected' : null ?>>
                            <?= $curso->curso ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar</button>

        </form>
        <br>
        <br>
        <br>


    </div>
    <!-- Pie de documento -->
    <?php include 'partials/footer.html' ?>


    <!-- js bootstrap 532-->
    <?php include 'layouts/javascript.html' ?>
</body>

</html>