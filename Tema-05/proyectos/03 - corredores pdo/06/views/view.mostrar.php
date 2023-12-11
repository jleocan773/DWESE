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

        <legend>Formulario Mostrar Corredor</legend>

        <!-- Formulario Mostrar -->
        <form>

            <!-- ID -->
            <div class="mb-3">
                <input type="number" class="form-control" name="id" value="<?= $corredor_mostrar->id; ?>" hidden>
            </div>

            <!-- Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= $corredor_mostrar->nombre ?>" disabled>
            </div>

            <!-- Apellidos -->
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" value="<?= $corredor_mostrar->apellidos ?>" disabled>
            </div>

            <!-- Ciudad -->
            <div class="mb-3">
                <label for="ciudad" class="form-label">Ciudad</label>
                <input type="text" class="form-control" name="ciudad" value="<?= $corredor_mostrar->ciudad ?>" disabled>
            </div>

            <!-- Fecha de Nacimiento -->
            <div class="mb-3">
                <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                <input type="text" class="form-control" name="fechaNacimiento" value="<?= $corredor_mostrar->fechaNacimiento ?>" disabled>
            </div>

            <!-- Sexo -->
            <div class="mb-3">
                <label for="sexo" class="form-label">Sexo</label>
                <input type="text" class="form-control" name="sexo" value="<?= $corredor_mostrar->sexo ?>" disabled>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" value="<?= $corredor_mostrar->email ?>" disabled>
            </div>

            <!-- DNI -->
            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni" pattern="[0-9]{8}[a-zA-Z]" value="<?= $corredor_mostrar->dni ?>" disabled>
            </div>

            <!-- Edad -->
            <div class="mb-3">
                <label for="edad" class="form-label">Edad</label>
                <input type="text" class="form-control" name="edad" value="<?= $corredor_mostrar->edad ?>" disabled>
            </div>

            <!-- Categoria Select -->
            <div class="mb-3">
                <label for="id_categoria" class="form-label">Categoria</label>
                <select class="form-select" aria-label="Default select example" name="id_categoria" disabled>
                    <?php foreach ($categorias as $data) : ?>
                        <option value="<?= $data->id ?>" <?= ($corredor_mostrar->id_categoria == $data->id) ? 'selected' : null ?>>
                            <?= $data->nombre ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Club Select -->
            <div class="mb-3">
                <label for="id_club" class="form-label">Club</label>
                <select class="form-select" aria-label="Default select example" name="id_club" disabled>
                    <?php foreach ($clubs as $data) : ?>
                        <option value="<?= $data->id ?>" <?= ($corredor_mostrar->id_club == $data->id) ? 'selected' : null ?>>
                            <?= $data->nombre ?>
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