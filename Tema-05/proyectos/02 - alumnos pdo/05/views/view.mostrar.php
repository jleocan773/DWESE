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


        <!-- Formulario Mostrar Alumno -->
        <form method="GET">

            <!-- ID -->
            <div class="mb-3">
                <label class="form-label">ID</label>
                <input type="number" class="form-control" name="id" value="<?= $alumno->id; ?>" disabled>
            </div>

            <!-- Nombre -->

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= $alumno->nombre; ?>" disabled>
            </div>

            <!-- Apellidos -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" value="<?= $alumno->apellidos; ?>" disabled>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" value="<?= $alumno->email; ?>" disabled>
            </div>

            <!-- Teléfono -->
            <div class="mb-3">
                <label class="form-label">Teléfono</label>
                <input type="text" class="form-control" name="telefono" value="<?= $alumno->telefono; ?>" disabled>
            </div>

            <!-- Dirección -->
            <div class="mb-3">
                <label for="precio" class="form-label">Dirección </label>
                <input type="text" class="form-control" name="direccion" value="<?= $alumno->direccion; ?>" disabled>
            </div>

            <!-- Población -->
            <div class="mb-3">
                <label for="precio" class="form-label">Población </label>
                <input type="text" class="form-control" name="poblacion" value="<?= $alumno->poblacion; ?>" disabled>
            </div>

            <!-- Provincia -->
            <div class="mb-3">
                <label for="precio" class="form-label">Provincia </label>
                <input type="text" class="form-control" name="provincia" value="<?= $alumno->provincia; ?>" disabled>
            </div>

            <!-- Nacionalidad -->
            <div class="mb-3">
                <label for="precio" class="form-label">Nacionalidad </label>
                <input type="text" class="form-control" name="nacionalidad" value="<?= $alumno->nacionalidad; ?>" disabled>
            </div>

            <!-- DNI -->
            <div class="mb-3">
                <label for="precio" class="form-label">DNI </label>
                <input type="text" class="form-control" name="dni" value="<?= $alumno->dni; ?>" disabled>
            </div>

            <!-- Fecha de Nacimiento -->
            <div class="mb-3">
                <label for="precio" class="form-label">Fecha de Nacimiento </label>
                <input type="text" class="form-control" name="fechaNac" value="<?= $alumno->fechaNac; ?>" disabled>
            </div>

            <!-- Curso -->
            <div class="mb-3">
                <label class="form-label">Curso</label>
                <?php foreach ($cursos as $curso) : ?>
                    <?php if ($curso->id === $alumno->id_curso) : ?>
                        <input type="text" class="form-control" name="curso" value="<?= $curso->curso; ?>" disabled>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>


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