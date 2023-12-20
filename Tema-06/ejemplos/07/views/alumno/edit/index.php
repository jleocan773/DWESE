<!DOCTYPE html>
<html lang="es">

<!-- Head -->
<head>
	<?php require_once("template/partials/head.php") ?>
	<title><?=$this->title?></title>
</head>

<body>
    <!-- Menú Proyecto -->
    <?php require_once("template/partials/menu.php") ?>
    <br><br><br>

    <!-- Capa principal -->
    <div class="container">

        <!-- Cabecera documento -->
        <?php require_once("views/alumno/partials/header.php") ?>

        <legend>Formulario Nuevo Alumno</legend>

        <!-- Formulario Nuevo Artículo -->
        <form action="<?= URL ?>alumno/update/<?= $this->id?>" method="POST">

            <!-- ID Oculta -->
            <div class="mb-3">
                <label for="id" class="form-label" hidden>ID</label>
                <input type="number" class="form-control" name="id" value="<?= $this->alumno->id?>" hidden>
            </div>

            <!-- Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= $this->alumno->nombre?>">
            </div>

            <!-- Apellidos -->
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" value="<?= $this->alumno->apellidos?>">
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" value="<?= $this->alumno->email?>">
            </div>

            <!-- Telefono -->
            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono</label>
                <input type="tel" class="form-control" name="telefono" value="<?= $this->alumno->telefono?>">
            </div>

            <!-- Dirección -->
            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" name="direccion" value="<?= $this->alumno->direccion?>">
            </div>

            <!-- Población -->
            <div class="mb-3">
                <label for="poblacion" class="form-label">Población</label>
                <input type="text" class="form-control" name="poblacion" value="<?= $this->alumno->poblacion?>">
            </div>

            <!-- Provincia -->
            <div class="mb-3">
                <label for="provincia" class="form-label">Provincia</label>
                <input type="text" class="form-control" name="provincia" value="<?= $this->alumno->provincia?>">
            </div>

            <!-- Nacionalidad -->
            <div class="mb-3">
                <label for="nacionalidad" class="form-label">Nacionalidad</label>
                <input type="text" class="form-control" name="nacionalidad" value="<?= $this->alumno->nacionalidad?>">
            </div>

            <!-- DNI -->
            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni" pattern="[0-9]{8}[a-zA-Z]" value="<?= $this->alumno->dni?>">
            </div>

            <!-- Fecha Nacimiento -->
            <div class="mb-3">
                <label for="fechaNac" class="form-label">Fecha Nacimiento YYYY/MM/DD</label>
                <input type="text" class="form-control" name="fechaNac" value="<?= $this->alumno->fechaNac?>">
            </div>

            <!-- Curso Select -->
            <div class="mb-3">
                <label for="id_curso" class="form-label">Curso</label>
                <select class="form-select" aria-label="Default select example" name="id_curso" value="<?= $this->alumno->id_curso?>">
                    <option selected disabled>Seleccione Curso</option>
                    <?php foreach ($this->cursos as $curso) : ?>
                        <option value="<?= $curso->id ?>" <?= ($this->alumno->id_curso == $curso->id) ? 'selected' : null ?>>
                            <?= $curso->curso ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- botones de acción -->
            <a class="btn btn-secondary" href="<?= URL ?>/alumno" role="button">Cancelar</a>
            <button type="reset" class="btn btn-danger">Restaurar</button>
            <button type="submit" class="btn btn-primary">Enviar</button>

        </form>

        <br>
        <br>
    </div>
    <br>
    <br>
    <!-- Pié del documento -->
    <?php require_once("template/partials/footer.php") ?>


    <!-- javascript bootstrap 532 -->
    <?php require_once("template/partials/javascript.php") ?>
</body>

</html>